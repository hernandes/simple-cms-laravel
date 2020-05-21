<?php
namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductOptionsController extends Controller
{

    protected $willcard = 'product-options';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:product-options', ['only' => ['index']]);
        $this->middleware('permission:create product-option', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit product-option', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy product-option', ['only' => ['destroy']]);
    }

    public function create(Product $product)
    {
        $option = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $option,
            'product' => $product
        ]);
    }

    public function store(Product $product)
    {
        request()->validate([
            'name' => 'required',
        ]);

        try {
            DB::transaction(function () use ($product) {
                $option = Option::create([
                    'name' => request('name'),
                    'type' => 'dropdown',
                    'is_required' => true
                ]);

                foreach (request('values', []) as $value) {
                    $value = trim($value);
                    if (!empty($value)) {
                        $option->values()->create([
                            'label' => $value,
                            'price_type' => 'fixed'
                        ]);
                    }
                }

                $product->options()->attach($option);
            });

            return success(trans('admin.modules.' . $this->willcard . '.messages.success_create'),
                route('admin.products.edit', $product->id), true);
        } catch (\Exception $ex) {
            error($ex->getMessage(), route('admin.products.edit', $product->id), true);
        }

        return redirect()->route('admin.products.edit', $product->id);
    }

    public function edit(Product $product, Option $option)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $option,
            'product' => $product
        ]);
    }

    public function update(Product $product, Option $option)
    {
        request()->validate([
            'name' => 'required'
        ]);

        try {
            DB::transaction(function () use ($option) {
                $option->update(request()->only('name'));

                $option->values()->delete();

                foreach (request('values', []) as $value) {
                    $value = trim($value);
                    if (!empty($value)) {
                        $option->values()->create([
                            'label' => $value,
                            'price_type' => 'fixed'
                        ]);
                    }
                }
            });

            return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
                route('admin.products.edit', $product->id), true);
        } catch (\Exception $ex) {
            return error($ex->getMessage(), route('admin.products.edit', $product->id), true);
        }
    }

    public function destroy(Product $product, Option $option)
    {
        $option->delete();

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'),
            route('admin.products.edit', $product->id), true);
    }
}

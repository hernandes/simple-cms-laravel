<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    protected $willcard = 'products';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:products', ['only' => ['index']]);
        $this->middleware('permission:create products', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit products', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy products', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::all();

        return view('admin.' . $this->willcard . '.index', compact('products'));
    }

    public function create()
    {
        $product = null;
        $categories = ProductCategory::toTreeList();

        return view('admin.' . $this->willcard . '.create', [
            'model' => $product,
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'active' => 'boolean',
            'featured' => 'boolean'
        ];

        if (config('modules.products.config.with_price')) {
            $rules += [
                'allow_price' => 'boolean',
                'price' => 'required_if:allow_price,1'
            ];
        }

        if (config('modules.products.config.with_stock')) {
            $rules += [
                'stock' => 'required',
            ];
        }

        request()->validate($rules);

        try {
            DB::transaction(function () {
                $product = Product::create(request()->except('categories', 'tags'));

                if (config('modules.products.config.with_categories')) {
                    $product->categories()->sync(request('categories'));
                }

                if (config('modules.products.config.with_tags')) {
                    $product->retag(request('tags'));
                }
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect()->route('admin.' . $this->willcard . '.index');
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::toTreeList();

        return view('admin.' . $this->willcard . '.edit', [
            'model' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Product $product)
    {
        $rules = [
            'name' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'active' => 'boolean',
            'featured' => 'boolean',
            'slug' => 'required'
        ];

        if (config('modules.products.config.with_price')) {
            $rules += [
                'allow_price' => 'boolean',
                'price' => 'required_if:allow_price,1'
            ];
        }

        if (config('modules.products.config.with_stock')) {
            $rules += [
                'stock' => 'required',
            ];
        }

        request()->validate($rules);

        request()->merge([
            'active' => request()->has('active'),
            'featured' => request()->has('featured'),
            'allow_price' => request()->has('allow_price'),
        ]);

        try {
            DB::transaction(function () use ($product) {
                $product->update(request()->except('categories', 'tags'));

                if (config('modules.products.config.with_categories')) {
                    $product->categories()->sync(request('categories'));
                }

                if (config('modules.products.config.with_tags')) {
                    $product->retag(request('tags'));
                }
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();

        success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'));

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'url' => route('admin.' . $this->willcard . '.index')
            ]);
        } else {
            return redirect()->back();
        }
    }

}

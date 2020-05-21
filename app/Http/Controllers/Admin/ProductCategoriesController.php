<?php
namespace App\Http\Controllers\Admin;

use App\Models\ProductCategory;

class ProductCategoriesController extends Controller
{

    protected $willcard = 'product-categories';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:product-categories', ['only' => ['index']]);
        $this->middleware('permission:create product-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit product-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy product-category', ['only' => ['destroy']]);
        $this->middleware('permission:reorder product-category', ['only' => ['reorder']]);
    }

    public function index()
    {
        $categories = ProductCategory::defaultOrder()
            ->get()
            ->toTree();
        $parents = ProductCategory::toTreeList();
        $model = null;

        return view('admin.' . $this->willcard . '.index', compact('categories', 'model', 'parents'));
    }

    public function create()
    {
        $category = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $category
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'active' => 'boolean',
            'featured' => 'boolean'
        ]);

        try {
            ProductCategory::create(request()->only([
                'name', 'active', 'featured', 'parent_id'
            ]));

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(ProductCategory $productCategory)
    {
        $parents = ProductCategory::toTreeList();

        return view('admin.' . $this->willcard . '.edit', [
            'model' => $productCategory,
            'parents' => $parents
        ]);
    }

    public function update(ProductCategory $productCategory)
    {
        request()->validate([
            'name' => 'required',
            'active' => 'boolean',
            'featured' => 'boolean',
            'slug' => 'required'
        ]);

        request()->merge([
            'active' => request()->has('active'),
            'featured' => request()->has('featured')
        ]);

        try {
            $productCategory->update(request()->only([
                'name', 'active', 'featured', 'parent_id', 'description', 'slug', 'image'
            ]));

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

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

    public function reorder()
    {
        $data = request('data');

        ProductCategory::rebuildTree($data, false);
    }

    public function upload()
    {
        request()->validate([
            'image' => 'required|image|max:2048'
        ]);

        return to_json(ProductCategory::upload('product-categories'));
    }
}

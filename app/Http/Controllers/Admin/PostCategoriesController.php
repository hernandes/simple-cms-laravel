<?php
namespace App\Http\Controllers\Admin;

use App\Models\PostCategory;
use DB;

class PostCategoriesController extends Controller
{

    protected $willcard = 'post-categories';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:post-categories', ['only' => ['index']]);
        $this->middleware('permission:create post-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit post-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy post-category', ['only' => ['destroy']]);
        $this->middleware('permission:reorder post-category', ['only' => ['reorder']]);
    }

    public function index()
    {
        $categories = PostCategory::ordered()->get();

        return view('admin.' . $this->willcard . '.index', compact('categories'));
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
        $data = request()->validate([
            'name' => 'required',
            'active' => 'boolean'
        ]);

        try {
            PostCategory::create($data);

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(PostCategory $postCategory)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $postCategory
        ]);
    }

    public function update(PostCategory $postCategory)
    {
        $data = request()->validate([
            'name' => 'required',
            'active' => 'boolean',
            'slug' => 'required'
        ]);
        $data['active'] = request()->has('active');

        try {
            $postCategory->update($data);

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

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
        PostCategory::setNewOrder(array_values(request('order')));
    }
}

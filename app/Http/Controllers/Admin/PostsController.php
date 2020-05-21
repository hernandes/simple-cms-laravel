<?php
namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use DB;

class PostsController extends Controller
{

    protected $willcard = 'posts';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:posts', ['only' => ['index']]);
        $this->middleware('permission:create post', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit post', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy post', ['only' => ['destroy']]);
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin.' . $this->willcard . '.index', compact('posts'));
    }

    public function create()
    {
        $post = null;
        $categories = PostCategory::activated()->ordered()->get();

        return view('admin.' . $this->willcard . '.create', [
            'model' => $post,
            'categories' => $categories
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'active' => 'boolean',
            'body' => 'required'
        ]);

        try {
            DB::transaction(function () {
                $post = Post::create(request()->except('categories', 'tags'));

                if (config('modules.posts.config.with_categories')) {
                    $post->categories()->sync(request('categories'));
                }

                if (config('modules.posts.config.with_tags')) {
                    $post->retag(request('tags'));
                }
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Post $post)
    {
        $categories = PostCategory::activated()->ordered()->get();

        return view('admin.' . $this->willcard . '.edit', [
            'model' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required',
            'active' => 'boolean',
            'body' => 'required'
        ]);
        request()->merge([
            'active' => request()->has('active')
        ]);

        try {
            DB::transaction(function () use ($post) {
                $post->update(request()->except('categories', 'tags'));

                if (config('modules.posts.config.with_categories')) {
                    $post->categories()->sync(request('categories'));
                }

                if (config('modules.posts.config.with_tags')) {
                    $post->retag(request('tags'));
                }
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();

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

    public function upload()
    {
        request()->validate([
            'image' => 'required|image|max:512'
        ]);

        return to_json(Post::upload('posts'));
    }

}

<?php
namespace App\Http\Controllers\Web;

use App\Models\Page;
use App\Models\Post;

class PostsController extends Controller
{

    public function index()
    {
        $page = Page::where('key', 'posts')->first();
        $page->configSeo();

        $posts = Post::latest()->paginate(12);

        return view('web.posts.index', compact('page', 'posts'));
    }

    public function show($slug = null)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $page = Page::where('key', 'posts')->first();

        return view('web.posts.show', compact('post', 'page'));
    }

}

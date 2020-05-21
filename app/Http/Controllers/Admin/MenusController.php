<?php
namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use DB;

class MenusController extends Controller
{

    protected $willcard = 'menus';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:menus', ['only' => ['index']]);
        $this->middleware('permission:create menu', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit menu', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy menu', ['only' => ['destroy']]);
        $this->middleware('permission:reorder menu', ['only' => ['reorder']]);
    }

    public function index()
    {
        $menus = Menu::defaultOrder()
            ->get()
            ->toTree();

        $pages = Page::get()->pluck('title', 'id');
        $posts = Post::get()->pluck('title', 'id');
        $parents = Menu::toTreeList();
        $menu = null;

        return view('admin.' . $this->willcard . '.index', compact(
            'menus', 'menu', 'parents', 'pages', 'posts'
        ));
    }

    public function create()
    {
        $menu = null;
        $pages = Page::get()->pluck('title', 'id');
        $posts = Post::get()->pluck('title', 'id');
        $menus = Menu::toTreeList();

        return view('admin.' . $this->willcard . '.create', compact('menu', 'pages', 'posts', 'menus'));
    }

    public function store()
    {
        request()->validate([
            'title' => 'required'
        ]);

        try {
            Menu::create(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect()->route('admin.menus.index');
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Menu $menu)
    {
        $pages = Page::get()->pluck('title', 'id');
        $posts = Post::get()->pluck('title', 'id');
        $parents = Menu::toTreeList();

        return view('admin.' . $this->willcard . '.edit', compact('menu', 'pages', 'posts', 'parents'));
    }

    public function update(Menu $menu)
    {
        request()->validate([
            'title' => 'required'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);

        try {
            $menu->update(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

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

        Menu::rebuildTree($data, false);
    }

}

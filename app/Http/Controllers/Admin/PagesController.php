<?php
namespace App\Http\Controllers\Admin;

use App\Models\Page;
use DB;

class PagesController extends Controller
{

    protected $willcard = 'pages';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:pages', ['only' => ['index']]);
        $this->middleware('permission:create page', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit page', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy page', ['only' => ['destroy']]);
    }

    public function index()
    {
        $pages = Page::all();

        return view('admin.' . $this->willcard . '.index', compact('pages'));
    }

    public function create()
    {
        $page = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $page
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'active' => 'boolean',
            'body' => 'nullable|string',
            'key' => 'required',
            'featured' => 'boolean'
        ]);

        $data += [
            'active' => request()->has('active'),
            'featured' => request()->has('featured')
        ];

        try {
            DB::transaction(function () use ($data) {
                $page = Page::create($data);
                $page->updateOrCreateSeo(request('seo'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Page $page)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $page
        ]);
    }

    public function update(Page $page)
    {
        $data = request()->validate([
            'title' => 'required',
            'active' => 'boolean',
            'body' => 'nullable|string',
            'key' => 'required',
            'featured' => 'boolean'
        ]);

        $data += [
            'active' => request()->has('active'),
            'featured' => request()->has('featured'),
            'slug' => request('slug')
        ];

        try {
            DB::transaction(function () use ($page, $data) {
                $page->update($data);
                $page->updateOrCreateSeo(request('seo'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Page $page)
    {
        $page->delete();

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

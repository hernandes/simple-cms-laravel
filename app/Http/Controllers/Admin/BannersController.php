<?php
namespace App\Http\Controllers\Admin;

use App\Models\Banner;

class BannersController extends Controller
{

    protected $willcard = 'banners';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:banners', ['only' => ['index']]);
        $this->middleware('permission:create banner', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit banner', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy banner', ['only' => ['destroy']]);
        $this->middleware('permission:reorder banner', ['only' => ['reorder']]);
    }

    public function index()
    {
        $banners = Banner::ordered()->get();

        return view('admin.' . $this->willcard . '.index', compact('banners'));
    }

    public function create()
    {
        $banner = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $banner
        ]);
    }

    public function store()
    {
        request()->validate([
            'image' => 'required'
        ]);

        try {
            Banner::create(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Banner $banner)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $banner
        ]);
    }

    public function update(Banner $banner)
    {
        request()->validate([
            'image' => 'required'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);

        try {
            $banner->update(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

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
        Banner::setNewOrder(array_values(request('order')));
    }

    public function upload()
    {
        request()->validate([
            'image' => 'required|image|max:2048'
        ]);

        return to_json(Banner::upload('banners'));
    }

}

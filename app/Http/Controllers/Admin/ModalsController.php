<?php
namespace App\Http\Controllers\Admin;

use App\Models\Modal;

class ModalsController extends Controller
{

    protected $willcard = 'modals';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:modals', ['only' => ['index']]);
        $this->middleware('permission:create modal', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit modal', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy modal', ['only' => ['destroy']]);
    }

    public function index()
    {
        $modals = Modal::all();

        return view('admin.' . $this->willcard . '.index', compact('modals'));
    }

    public function create()
    {
        $modal = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $modal
        ]);
    }

    public function store()
    {
        try {
            Modal::create(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Modal $modal)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $modal
        ]);
    }

    public function update(Modal $modal)
    {
        request()->merge([
            'active' => request()->has('active'),
            'only_home' => request()->has('only_home')
        ]);

        try {
            $modal->update(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Modal $modal)
    {
        $modal->delete();

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
            'image' => 'required|image|max:2048'
        ]);

        return to_json(Modal::upload('modals'));
    }

}

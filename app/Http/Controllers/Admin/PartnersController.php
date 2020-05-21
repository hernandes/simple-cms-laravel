<?php
namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Uploader;

class PartnersController extends Controller
{

    protected $willcard = 'partners';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:partners', ['only' => ['index']]);
        $this->middleware('permission:create partner', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit partner', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy partner', ['only' => ['destroy']]);
        $this->middleware('permission:reorder partner', ['only' => ['reorder']]);
    }

    public function index()
    {
        $partners = Partner::ordered()->get();

        return view('admin.' . $this->willcard . '.index', compact('partners'));
    }

    public function create()
    {
        $partner = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $partner
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'logo' => 'required'
        ]);

        try {
            Partner::create(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Partner $partner)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $partner
        ]);
    }

    public function update(Partner $partner)
    {
        request()->validate([
            'name' => 'required',
            'logo' => 'required'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);

        try {
            $partner->update(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

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
        Partner::setNewOrder(array_values(request('order')));
    }

    public function upload()
    {
        request()->validate([
            'logo' => 'required|image|max:512'
        ]);

        return to_json(Partner::upload('partners', 'logo'));
    }

}

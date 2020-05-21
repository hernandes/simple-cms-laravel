<?php
namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use DB;

class SettingsController extends Controller
{

    protected $willcard = 'settings';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:settings', ['only' => ['index']]);
        $this->middleware('permission:create setting', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit setting', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy setting', ['only' => ['destroy']]);
    }

    public function index()
    {
        $settings = Setting::all();

        return view('admin.' . $this->willcard . '.index', compact('settings'));
    }

    public function create()
    {
        $setting = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $setting
        ]);
    }

    public function store()
    {
        request()->validate([
            'key' => 'required',
            'type' => 'required'
        ]);

        try {
            Setting::create(request()->only('key', 'type', 'description', 'value'));

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Setting $setting)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $setting
        ]);
    }

    public function update(Setting $setting)
    {
        request()->validate([
            'key' => 'required',
            'type' => 'required'
        ]);

        try {
            $setting->update(request()->only('key', 'type', 'description', 'value'));

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

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

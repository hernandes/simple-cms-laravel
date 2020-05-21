<?php
namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class RolesController extends Controller
{

    protected $willcard = 'roles';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:roles', ['only' => ['index']]);
        $this->middleware('permission:create role', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.' . $this->willcard . '.index', compact('roles'));
    }

    public function create()
    {
        $role = null;
        $permissions = Permission::all();

        return view('admin.' . $this->willcard . '.create', [
            'model' => $role,
            'permissions' => $permissions
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required'
        ]);

        try {
            DB::transaction(function () use ($data) {
                $role = Role::create($data);
                $role->permissions()->sync(request('permissions'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.' . $this->willcard . '.edit', [
            'model' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(Role $role)
    {
        $data = request()->validate([
            'name' => 'required'
        ]);

        try {
            DB::transaction(function () use ($role, $data) {
                $role->update($data);
                $role->permissions()->sync(request('permissions'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();

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

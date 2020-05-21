<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;

class UsersController extends Controller
{

    protected $willcard = 'users';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:users', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy user', ['only' => ['destroy']]);
    }

    public function dashboard()
    {
        return view('admin.' . $this->willcard . '.dashboard');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.' . $this->willcard . '.index', compact('users'));
    }

    public function create()
    {
        $user = null;
        $roles = Role::all();

        return view('admin.' . $this->willcard . '.create', [
            'model' => $user,
            'roles' => $roles
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'active' => 'boolean',
            'super_user' => 'boolean'
        ]);

        try {
            DB::transaction(function () {
                $user = User::create(request()->only([
                    'name', 'email', 'password', 'active',
                    'super_user', 'avatar'
                ]));
                $this->syncPermissions($user);
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect()->route('admin.' . $this->willcard . '.index');
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::with(['roles'])->findOrFail($id);
        $roles = Role::all();

        return view('admin.users.edit', [
            'model' => $user,
            'roles' => $roles
        ]);
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'active' => 'boolean',
            'super_user' => 'boolean'
        ]);
        request()->merge([
            'active' => request()->has('active'),
            'super_user' => request()->has('super_user')
        ]);

        $user->fill(request()->except('roles', 'password'));

        if (request('password')) {
            $user->password = request('password');
        }

        try {
            DB::transaction(function () use ($user) {
                $user->save();
                $this->syncPermissions($user);
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'));

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'url' => route('admin.users.index')
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function upload()
    {
        request()->validate([
            'avatar' => 'required|image|max:512'
        ]);

        return to_json(User::upload('users', 'avatar'));
    }

    private function syncPermissions($user)
    {
        $roles = collect($user->super_user ? [] : request('roles', []));
        $permissions = collect($user->super_user ? [] : request('permissions', []));

        $roles = Role::find($roles);

        if (!$user->hasAllRoles($roles)) {
            $user->permissions()->sync([]);
        } else {
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }

}

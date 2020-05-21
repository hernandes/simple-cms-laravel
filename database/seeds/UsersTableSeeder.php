<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'password' => '123456',
            'active' => true,
            'super_user' => true
        ]);

        $this->addRolesAndPermissions();
    }

    private function addRolesAndPermissions()
    {
        $permissions = [];

        $blacklist = [
            'AuthController',
            '@store',
            '@update',
            'LanguageController',
            'UsersController@dashboard'
        ];

        $modules = config('modules');
        foreach ($modules as $module) {
            if (!$module['active']) {
                $blacklist = array_merge($blacklist, $module['controllers']);
            } else {
                if (isset($module['controllers'])) {
                    foreach ($module['controllers'] as $name => $ctrl) {
                        if ($ctrl === false) {
                            $blacklist[] = $name;
                        }
                    }
                }
            }
        }

        foreach (\Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();

            if (array_key_exists('controller', $action)) {
                $inBlacklist = false;
                foreach ($blacklist as $term) {
                    if (strpos($action['controller'], $term) !== false) {
                        $inBlacklist = true;
                        break;
                    }
                }

                if (!$inBlacklist && strpos($action['controller'], '\Admin\\') !== false) {
                    list($controller, $act) = explode('@', $action['controller']);
                    $parts = explode('\\', $controller);
                    $ctr = \Str::snake(str_replace('Controller', '', $parts[count($parts) - 1]), '-');

                    if ($act === 'index') {
                        $name = $ctr;
                    } else {
                        $name = $act . ' ' .  \Str::singular($ctr);
                    }

                    $permissions[] = $name;
                }
            }
        }


        $permissions = collect($permissions)->map(function ($name) {
            return Permission::create([
                'name' => $name,
                'guard_name' => 'admin'
            ]);
        });

        collect([
            'Administrador'
        ])->map(function ($name) use ($permissions) {
            $role = Role::create([
                'name' => $name,
                'guard_name' => 'admin'
            ]);
            $role->givePermissionTo($permissions);
        });
    }
}

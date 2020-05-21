<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class Permission
{
    public function handle($request, Closure $next, $permission)
    {
        if (auth('admin')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if (auth('admin')->user()->super_user) {
            return $next($request);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (auth('admin')->user()->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}

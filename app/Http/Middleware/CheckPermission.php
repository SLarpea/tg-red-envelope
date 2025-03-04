<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions)
    {
        $permissions = explode('|', $permissions);
        $user = auth()->user();
        foreach ($permissions as $permission) {
            $permission = trim($permission);

            if (($user && $user->hasPermissionTo($permission)) == false) {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}

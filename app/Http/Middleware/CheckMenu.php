<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUrl = basename(url()->current());

        $ignore = ['menus', 'configs'];

        if (!in_array($currentUrl, $ignore) && !Menu::where(['url' => $currentUrl, 'status' => 1])->exists()) {
            abort(403);
        }

        return $next($request);
    }
}

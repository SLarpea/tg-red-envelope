<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use App\Services\Dashboard\NotificationService;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'user.permissions' => function () use ($request) {
                return ( $request->user() ? $request->user()->getAllPermissions()->pluck('name') : null );
            },
            'user.roles' => function () use ($request) {
                return ( $request->user() ? $request->user()->roles()->pluck('name') : null );
            },
            'user.locale' => function () use ($request) {
                return session('locale');
            },
            'notifications' => function () use ($request) {
                return app(NotificationService::class)->getUnreadNotifications();
            },
        ]);
    }
}

<?php

namespace App\Providers;

use App\Models\Menu;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Check if the 'menu' table exists
        if (Schema::hasTable('menus')) {
            // Fetch and share the menu data with Inertia
            Inertia::share('sidemenu', Menu::get());
        }
    }
}

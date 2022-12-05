<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // To add side menu for super_admin only
        Gate::define('super_admin', function ($user) { return $user->hasRole('super_admin'); });
        Gate::define('both_admin', function ($user) { return $user->hasRole(['super_admin', 'admin']); });
        Gate::define('admin', function ($user) { return $user->hasRole('admin'); });
        Gate::define('teacher', function ($user) { return $user->hasRole('teacher'); });
        Gate::define('student', function ($user) { return $user->hasRole('student'); });


    }
}

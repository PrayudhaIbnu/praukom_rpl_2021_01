<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //pagination 
        Paginator::useBootstrap();

        // gate untuk superadmin
        Gate::define('superadmin', function (User $user) {
            return $user->level_user->nama_level === 'Super Admin';
        });
        // gate untuk admin
        Gate::define('admin', function (User $user) {
            return $user->level_user->nama_level === 'Admin';
        });
        // gate untuk kasir
        Gate::define('kasir', function (User $user) {
            return $user->level_user->nama_level === 'Kasir';
        });
        // gate untuk pengawas
        Gate::define('pengawas', function (User $user) {
            return $user->level_user->nama_level === 'Pengawas';
        });
        // gate untuk admin, pengawas, kasir
        Gate::define('admin-pengawas-kasir', function (User $user) {
            return (in_array($user->level_user->nama_level, ['Admin', 'Pengawas', 'Kasir']));
        });
        // gate untuk admin, pengawas
        Gate::define('admin-pengawas', function (User $user) {
            return (in_array($user->level_user->nama_level, ['Admin', 'Pengawas']));
        });
    }
}

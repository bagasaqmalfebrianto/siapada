<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        //

        Gate::define('admin',function(User $user){
            return $user->is_admin;
        });

        Gate::define('penjual',function(User $user){
            return $user->is_penjual;
        });
        Gate::define('pencari_kerja' , function(User $user){
            return $user->is_pencari_kerja;
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/* tambahan */
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 
        Permission::get()->map(function ($permission){
            // declare nama permission, buat fungsi authenticate user, use permission parameter
            Gate::define($permission->name, function($user) use ($permission){
                return $user->hasPermissionTo($permission);
            });
        });

        /*untuk membuat directive role di templating blade*/
        Blade::if('role', function($role){
            return auth()->user()->hasRole($role);
        });
    }
}

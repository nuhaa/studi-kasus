<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/* tambahan */
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

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
            Gate::define($permission->name, function($user) use ($permission){
                return $user->hasPermissionTo($permission);
            })
        })
    }
}

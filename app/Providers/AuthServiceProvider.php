<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions=Permission::get();
        foreach ($permissions as $permission){
            Gate::define($permission->name,function ($user) use ($permission){
                foreach ($user->roles as $role) {
                    foreach ($role->permissions as $per) {
                        if ($per->name == $permission->name) {
                            return true;
                        }
                    }
                }
                return false;
            });

        }


        //
    }
}

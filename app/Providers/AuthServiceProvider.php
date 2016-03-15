<?php

namespace App\Providers;

use App\Permission; //comentar al realizar una instalacion nueva
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Schema;
use App\Project;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

      /*  $gate->define('show-regions', function($user)
        {
            return $user->role == 'Administrator';

        });*/

        $gate->define('edit-project', function($user, $project)
        {
            return $user->id == $project->user_id;

        });

        $gate->define('edit-offering', function($user, $offering)
        {
            return $user->id == $offering->user_id;

        });

        if (Schema::hasTable('permissions'))
        {
        foreach ($this->getPermissions () as $permission) { //comentar en instalación nueva
            $gate->define($permission->name, function ($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
        }
    }


    protected function getPermissions() //comentar en instalación nueva
    {
        return Permission::with('roles')->get();
    }

}

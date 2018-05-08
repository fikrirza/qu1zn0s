<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerUserPolicies();

    }

    public function registerUserPolicies(){
        
        Gate::define('read-user', function($user){
            return $user->hasAccess(['read-user']);
          });
          Gate::define('create-user', function($user){
            return $user->hasAccess(['create-user']);
          });
          Gate::define('update-user', function($user){
            return $user->hasAccess(['update-user']);
          });
          Gate::define('reset-user', function($user){
            return $user->hasAccess(['reset-user']);
          });
          Gate::define('activate-user', function($user){
            return $user->hasAccess(['activate-user']);
          });
          Gate::define('read-role', function($user){
            return $user->hasAccess(['read-role']);
          });
          Gate::define('create-role', function($user){
            return $user->hasAccess(['create-role']);
          });
          Gate::define('update-role', function($user){
            return $user->hasAccess(['update-role']);
          });
          Gate::define('management-user', function($user){
            return $user->inRole('administrator');
          });
          Gate::define('management-role', function($user){
            return $user->inRole('administrator');
          });
    }
}

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

        $this->registerWarehousePolicies();
        $this->registerItemPolicies();
        $this->registerItemCategoryPolicies();
        $this->registerSupplierPolicies();
        $this->registerPOPolicies();
        $this->registerUserPolicies();

    }

    public function registerWarehousePolicies(){
      
      Gate::define('read-warehouse', function($user){
        return $user->hasAccess(['read-warehouse']);
      });
      Gate::define('create-warehouse', function($user){
        return $user->hasAccess(['create-warehouse']);
      });
      Gate::define('update-warehouse', function($user){
        return $user->hasAccess(['update-warehouse']);
      });

    }

    public function registerItemPolicies(){
      
      Gate::define('read-item', function($user){
        return $user->hasAccess(['read-item']);
      });
      Gate::define('create-item', function($user){
        return $user->hasAccess(['create-item']);
      });
      Gate::define('update-item', function($user){
        return $user->hasAccess(['update-item']);
      });

    }

    public function registerItemCategoryPolicies(){
      
      Gate::define('read-itemCategory', function($user){
        return $user->hasAccess(['read-itemCategory']);
      });
      Gate::define('create-itemCategory', function($user){
        return $user->hasAccess(['create-itemCategory']);
      });
      Gate::define('update-itemCategory', function($user){
        return $user->hasAccess(['update-itemCategory']);
      });

    }

    public function registerSupplierPolicies(){
      
      Gate::define('read-supplier', function($user){
        return $user->hasAccess(['read-supplier']);
      });
      Gate::define('create-supplier', function($user){
        return $user->hasAccess(['create-supplier']);
      });
      Gate::define('update-supplier', function($user){
        return $user->hasAccess(['update-supplier']);
      });

    }

    public function registerPOPolicies(){

      Gate::define('read-po', function($user){
        return $user->hasAccess(['read-po']);
      });
      Gate::define('create-po', function($user){
        return $user->hasAccess(['create-po']);
      });
      Gate::define('update-po', function($user){
        return $user->hasAccess(['update-po']);
      });

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

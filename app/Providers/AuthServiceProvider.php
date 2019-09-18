<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    protected $role;

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function __construct()
    {
        $this->role = [
            'collaborator' => 1,
            'editor' => 2,
            'admin' => 3
        ];
    }
    public function only($options)
    {
        $permission = Auth::user()->level;
        return in_array(array_search($permission,$this->role),array_wrap($options)) ? 1 : 0;
    }
    public function except($options)
    {
        $permission = Auth::user()->level;
        return !in_array(array_search($permission,$this->role),array_wrap($options)) ? 1 : 0;
    }
    public function all()
    {
        return TRUE;
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
         * Admin - Manager account
         */
        Gate::define('admin.view.admin.account',function($user){
            return $this->only(['admin']);
        });
        Gate::define('admin.view-create.admin.account',function ($user){
            return $this->only('admin');
        });
        Gate::define('admin.create.admin.account',function($user){
            return $this->only('admin');
        });
        Gate::define('admin.view-edit.admin.account',function ($user){
            return $this->only('admin');
        });
        Gate::define('admin.edit.admin.account',function ($user){
            return $this->only('admin');
        });
        Gate::define('admin.delete.admin.account',function ($user){
            return $this->only('admin');
        });
        /*
         * User - Manager account
         */
        Gate::define('admin.view.user.account',function($user){
            return $this->only('admin');
        });
        Gate::define('admin.view-create.user.account',function ($user){
            return $this->only('admin');
        });
        Gate::define('admin.create.user.account',function($user){
            return $this->only('admin');
        });
        Gate::define('admin.view-edit.user.account',function ($user){
            return $this->only('admin');
        });
        Gate::define('admin.edit.user.account',function ($user){
            return $this->only('admin');
        });
    }
}

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
        //dd($this->role[$options]);
        if($permission == $this->role[$options]){
            return 1;
        }
        else{
            return 0;
        }
        //return in_array(array_search($permission,$this->role),array_wrap($options)) ? 1 : 0;
    }
    public function except($options)
    {
        $permission = Auth::user()->level;
        if($permission == $this->role[$options]){
            return 0;
        }
        else{
            return 1;
        }
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
        Gate::define('admin',function($user){
            return $this->only('admin');
        });
        Gate::define('collaborator', function($user){
           return $this->except('collaborator');
        });
    }
}

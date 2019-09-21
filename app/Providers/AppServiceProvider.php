<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use URL;

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
        //URL::forceScheme('https');
        Schema::defaultStringLength(191);
        if(! $this->app->runningInConsole()) {

            // $data['cate_blogs'] = DB::table('cate_blogs')->orderBy('id', 'DESC')->get();
            // $data['cate_librarys'] = DB::table('cate_librarys')->orderBy('id', 'DESC')->get();

            view()->share($data);
        }
        
    }
}

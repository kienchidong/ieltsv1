<?php

namespace App\Providers;

use App\Model\IntroduceModel;
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
        if (!$this->app->runningInConsole()) {
            $data['student'] = DB::table('student')->limit(3)->get();

            $data['registration'] = DB::table('registration')->first();
            $data['contacts'] = DB::table('contacts')->where('status', 1)->get();
            $data['cate_librarys'] = DB::table('cate_librarys')->where('status', 1)->take(4)->get();
            $data['introduces'] = IntroduceModel::find(1);
            $data['roles'] = DB::table('role')->get();
            
            view()->share($data);
        }

    }
}

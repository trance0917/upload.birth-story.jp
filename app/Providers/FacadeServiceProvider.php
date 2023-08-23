<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'page_helper',
            \App\Http\Components\PageHelper::class
        );

        //
//        $this->app->bind(
//            'access_log',
//            \App\Http\Components\AccessLog::class
//        );



//        $this->app->bind(
//            'staff_login',
//            'App\Http\Components\Login\StaffLogin'
//        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

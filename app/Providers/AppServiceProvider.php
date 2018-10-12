<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Charts\OperasionalKhChart as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /**
         * Bootstrap any application services.
         *
         * @param 1: blade file, 2: class controller
         */
        View::composer(

            'adminwebskp.khoperasional.index',
            'App\Http\Controllers\AdminWeb\KhOperasionalController'
        );

        View::composer(

            'adminwebskp.ktoperasional.index',
            'App\Http\Controllers\AdminWeb\KtOperasionalController'
        );

        View::composer(

            'adminwebskp.pnbp.index',
            'App\Http\Controllers\AdminWeb\PnbpController'
        );

        View::composer(

            'adminwebskp.ikm.index',
            'App\Http\Controllers\AdminWeb\IkmController'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

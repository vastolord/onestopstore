<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.app',function($view){
        
            $view->with('cat',Category::all()->sortBy('name'))->with('bnd',Brand::all()->sortBy('brand'));

        });
        
        view()->composer('layouts.authapp',function($view){
        
            $view->with('cat',Category::all()->sortBy('name'))->with('bnd',Brand::all()->sortBy('brand'));

        });

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

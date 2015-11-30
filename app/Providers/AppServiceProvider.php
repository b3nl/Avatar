<?php

namespace Avatar\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('class_exists', function ($attribute, $value, array $parameters) {
            return class_exists($value, isset($parameters[0]) ? !$parameters[0] : true);
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

<?php

namespace Avatar\Providers;

use Avatar\Category;
use Avatar\Category\Observer as CategoryObserver;
use Avatar\Content;
use Avatar\Content\Observer as ContentObserver;
use Avatar\ContentType\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Validator;

/**
 * The basic provider for this cms.
 * @author b3nl <code@b3nl.de>
 * @category Providers
 * @package Avatar
 * @subpackage Providers\ContentType
 * @version $id$
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        $this->registerEvents();

        Validator::extend('class_exists', function ($attribute, $value, array $parameters) {
            return class_exists($value, isset($parameters[0]) ? !$parameters[0] : true);
        });
    } // function

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    } // function

    /**
     * Registers basic events.
     * @return AppServiceProvider
     */
    protected function registerEvents()
    {
        Category::observe($this->app->make(CategoryObserver::class));
        Content::observe($this->app->make(ContentObserver::class));

        return $this;
    } // function

    /**
     * Registers some services.
     * @return AppServiceProvider
     */
    protected function registerServices()
    {
        $this->app->singleton(Factory::class, function (Container $serviceContainer) {
            return new Factory($serviceContainer);
        });

        return $this;
    } // function
}

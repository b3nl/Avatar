<?php

namespace Avatar\Providers;

use Avatar\Commands\ModelMakeCommand;
use Illuminate\Support\ServiceProvider;

/**
 * The shell provider for this system.
 * @author b3nl <code@b3nl.de>
 * @category Providers
 * @package Avatar
 * @subpackage Providers
 * @version $id$
 */
class ArtisanServiceProvider extends ServiceProvider
{
    /**
     * Defers this service provider.
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return ['command.model.make'];
    } // function

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->registerModelMakeCommand();;
    } // function

    /**
     * Register the command.
     * @return void
     */
    protected function registerModelMakeCommand()
    {
        $this->app->singleton('command.model.make', function ($app) {
            return new ModelMakeCommand($app['files']);
        });
    } // function
}

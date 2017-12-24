<?php

namespace Tienlh\TokyoTyrantDriver;

use Illuminate\Support\ServiceProvider;
use Tienlh\TokyoTyrantDriver\Session\Handler;

class ServiceProvider extends ServiceProvider
{

    /**
     * Register tokyo-tyrant instance to container
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/tokyo_tyrant.php';
        $this->mergeConfigFrom($configPath, 'tokyo_tyrant');

        $this->app['session']->extend('tokyo_tyrant',
            function ($app) use ($this) {
                return new Handler($this->app['config']->get('tokyo_tyrant'));
            }
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/tokyo_tyrant.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

}

<?php

namespace Tienlh\Session;

use Illuminate\Support\ServiceProvider;
use Tienlh\Session\Handler;

class TokyoTyrantServiceProvider extends ServiceProvider
{

    /**
     * Register tokyo-tyrant instance to container
     *
     * @return void
     */
    public function register()
    {
        $this->app['session']->extend('tokyo_tyrant', function ($app) {
            return new Handler(config('tokyo_tyrant'));
        });
    }
}

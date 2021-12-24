<?php
/*
 * Copyright © 2021. mPhpMaster(https://github.com/mPhpMaster) All rights reserved.
 */

namespace mPhpMaster\StyleAttribute\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class StyleAttributeProvider
 *
 * @package mPhpMaster\StyleAttribute\Providers
 */
class StyleAttributeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @param Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        Builder::defaultStringLength(191);
        Schema::defaultStringLength(191);

        $this->app->bind('style-attribute', function () {
            return new \mPhpMaster\StyleAttribute\StyleAttribute();
        });

        /**
         * Helpers
         */
//        require_once __DIR__ . '/../Helpers/HelpersLoader.php';
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            StyleAttributeProvider::class
        ];
    }
}

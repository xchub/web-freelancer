<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tools\Permissions;
use App\Tools\Config;

class ToolsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Permissions', function () {
            return new Permissions;
        });

        $this->app->bind('Config', function () {
            return new Config;
        });
    }
}

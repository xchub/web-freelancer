<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tools\Permissions;

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

    }
}
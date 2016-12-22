<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LeanCloud\Client;
use LeanCloud\Engine\Cloud;
use LeanCloud\Engine\LaravelEngine;

class LeanCloudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        LaravelEngine::enableHttpsRedirect();

        // define cloud functions and/or hooks

        // /1.1/functions/sayHello
        Cloud::define("sayHello", function($params, $user) {
            return "hello {$params['name']}";
        });
    }

    /**
     * Initialize LeanCloud application id and key
     *
     * @return void
     */
    public function register()
    {
        Client::initialize(
            config('services.leancloud.id'),
            config('services.leancloud.key'),
            config('services.leancloud.masterKey')
        );
    }
}

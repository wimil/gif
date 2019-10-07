<?php

namespace Wimil\Gif;

use Illuminate\Support\ServiceProvider as BaseProvider;

class Provider extends BaseProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/gif.php' => config_path('gif.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/gif.php',
            'gif'
        );
    }

    public function register()
    {


        $this->app->singleton('gif', function ($app) {
            $config = $app['config']->get('gif');

             $client = new Factories\Client($config[$config['driver']]['base_url'], $config[$config['driver']]['api_key']);

            return new Gif($client);
        });

        $this->app->alias('gif', 'Wimil\Gif\Gif');
    }
}

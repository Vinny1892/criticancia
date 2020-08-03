<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use InfluxDB\Client as InfluxClient;
use InfluxDB\Database as InfluxDB;
use InfluxDB\Driver\UDP;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Prometheus\CollectorRegistry::class, function($app) {
            $registry = new \Prometheus\CollectorRegistry(new \Prometheus\Storage\Redis(['host'=> 'redis' , 'password' => 'seila123']));
            return $registry;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

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
        $this->app->singleton(InfluxDB::class, function($app) {
            $client = new InfluxClient(
                config('influxdb.host'),
                config('influxdb.port'),
                config('influxdb.username'),
                config('influxdb.password'),
                config('influxdb.ssl'),
                config('influxdb.verifySSL'),
                config('influxdb.timeout')
            );
            if (config('influxdb.udp.enabled') === true) {
                $client->setDriver(new UDP(
                    $client->getHost(),
                    config('influxdb.udp.port')
                ));
            }
            return $client->selectDB(config('influxdb.dbname'));
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

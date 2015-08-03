<?php

namespace Riverslei\Pusher;

use Illuminate\Support\ServiceProvider;

class PusherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/pusher.php';
        $this->publishes([$configPath => config_path('pusher.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/pusher.php';
        $this->mergeConfigFrom($configPath, 'pusher');
        
        $this->app->singleton('pusher', function(){
            $baidu = new BaiduPusher();
            $baidu->setApiKey(config('pusher.default_apiKey'));
            $baidu->setSecretKey(config('pusher.default_secretkey'));
            $baidu->setDeviceType(config('pusher.default_devicetype'));
            return $baidu;
        });
        
        $this->app->alias('pusher', 'Riverslei\Pusher\BaiduPusher');
    }
}

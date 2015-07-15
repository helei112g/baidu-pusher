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
            return new BaiduPusher();
        });
        
        $this->app->alias('pusher', 'Riverslei\Pusher\BaiduPusher');
    }
}

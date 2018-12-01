<?php

namespace Ssdk\Stock;

use Illuminate\Support\ServiceProvider;

class StockServiceProvider extends ServiceProvider
{
    public function register()
    {
        $config = config('ssdk_stock');

        //注入Client
        $this->app->singleton(Client::class, function() use ($config) {
            return new Client($config);
        });

        //注入Service
        $this->app->singleton(StockService::class, function(){
            return new StockService();
        });

        //注入日志组件
        $this->app->singleton(Log::class, function () use ($config) {
            return new Log($config);
        });
    }

    public function boot()
    {
        //发布配置文件
        $this->publishes([
            __DIR__ . '/config/ssdk_stock.php' => base_path('config/ssdk_stock.php'),
        ]);
    }
}

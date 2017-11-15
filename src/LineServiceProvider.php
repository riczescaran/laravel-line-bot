<?php

namespace Riczescaran\LaravelLineBot;

use Illuminate\Support\ServiceProvider;

class LineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/line-bot.php' => config_path('line-bot.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(Line::class, 'line');
    }
}

<?php

namespace PedroSancao\Cors;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cors.php', 'cors');
        
        $this->app['router']->aliasMiddleware(CorsMiddleware::class);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/cors.php' => config_path('cors.php'),
        ], 'cors-middlware');
    }

}

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
        $this->mergeConfigFrom(__DIR__ . '/../config/cors-middleware.php', 'cors-middleware');
        
        $this->app['router']->aliasMiddleware('cors', CorsMiddleware::class);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/cors-middleware.php' => config_path('cors-middleware.php'),
        ], 'cors-middlware');
    }

}

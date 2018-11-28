<?php

namespace HealthEngine\ApiTokenMiddleware;

use Illuminate\Support\ServiceProvider;

class ApiTokenServiceProvider extends ServiceProvider
{
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $router->aliasMiddleware('apitoken', 'HealthEngine\ApiTokenMiddleware\BasicApiTokenMiddleware');
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\ListTokens::class,
                Commands\CreateToken::class,
                Commands\DeleteToken::class,
                Commands\RegenerateToken::class,
            ]);
        }
    }

    public function register()
    {
    }
}

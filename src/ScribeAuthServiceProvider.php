<?php

namespace oralunal\ScribeAuth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use oralunal\ScribeAuth\Http\Middleware\ScribeAuthMiddleware;

class ScribeAuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootRoutes();

        $this->registerConfig();

        $this->bootViews();

        $this->app['router']->aliasMiddleware('scribe.auth', ScribeAuthMiddleware::class);
    }

    protected function bootRoutes(): void
    {
        $docsType = config('scribe.type', 'laravel');
        if (Str::endsWith($docsType, 'laravel') && config('scribe.laravel.add_routes', true)) {
            $routesPath = __DIR__ . '/../routes/laravel.php';
            $this->loadRoutesFrom($routesPath);
        }
    }

    protected function bootViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views/scribe_auth/', 'scribe_auth');
    }

    protected function registerConfig(): void
    {
        $this->publishes([
            __DIR__.'/../config/scribe_auth.php' => config_path('scribe_auth.php'),
        ], 'scribe-auth-config');

        $this->mergeConfigFrom(__DIR__.'/../config/scribe_auth.php', 'scribe_auth');
    }
}
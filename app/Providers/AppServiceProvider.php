<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleton('Illuminate\Contracts\Routing\ResponseFactory', function ($app) {
                return new \Illuminate\Routing\ResponseFactory(
                    $app['Illuminate\Contracts\View\Factory'],
                    $app['Illuminate\Routing\Redirector']
                );
            });


         if (env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    public function boot()
    {


        if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
    }
}

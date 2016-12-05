<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * La que va a cargar el vview composer y enviar los datos a la vista
     * @return void
     */
    public function boot()
    {
        View::composer('front.index', 'App\Http\ViewComposers\AsideComposer');

    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
        //$this->app->make('view')->composer('front.index', 'App\Http\ViewComposers\AsideComposer');
    }
}

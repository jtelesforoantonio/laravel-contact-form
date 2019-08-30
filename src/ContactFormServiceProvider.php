<?php

namespace JTelesforoAntonio\LaravelContactForm;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'contact_form');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contact_form');

        $this->publishes([
            __DIR__ . '/../config/contact_form.php' => config_path('contact_form.php')
        ], 'laravel-contact-form-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/contact_form')
        ], 'laravel-contact-form-views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/contact_form')
        ], 'laravel-contact-form-translations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/contact_form.php', 'contact_form'
        );
    }

    /**
     * Get the router.
     *
     * @return Route
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }

    /**
     * Boot the routes.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $this->getRouter()
             ->middleware('web')
             ->namespace('JTelesforoAntonio\LaravelContactForm\Http\Controllers')
             ->group(__DIR__ . '/../routes/web.php');
    }
}

<?php

namespace App\Providers;

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
        //
        // config()->set('jwt.ttl',null);
        $this->app->register(RepositoryServiceProvider::class);
       
        // var_dump(config()->get('jwt.ttl'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app['request']->server->set('HTTPS', false);
     }
}

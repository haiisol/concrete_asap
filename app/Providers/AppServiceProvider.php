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
        config()->set("jwt.required_claims",[
            'iss',
            'iat',
            // 'exp',
            'nbf',
            'sub',
            'jti',
        ]);
        config()->set('jwt.ttl',null);
        // var_dump();
        
        $this->app->register(RepositoryServiceProvider::class);
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

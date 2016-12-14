<?php

namespace PopTroco\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'PopTroco\Repositories\RoleRepository',
            'PopTroco\Repositories\RoleRepositoryEloquent'
        );

        $this->app->bind(
            'PopTroco\Repositories\TransactionRepository',
            'PopTroco\Repositories\TransactionRepositoryEloquent'
        );

        $this->app->bind(
            'PopTroco\Repositories\UserRepository',
            'PopTroco\Repositories\UserRepositoryEloquent'
        );
    }
}

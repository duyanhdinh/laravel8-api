<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceProvider extends ServiceProvider
{
    private $commonNamespace = 'App\Repositories';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindUserRepository();
    }

    private function bindUserRepository()
    {
        $namespace = $this->commonNamespace . '\User';

        /* User Repository*/
        $this->app->bind(
            $namespace . '\UserRepository\UserRepositoryInterface',
            $namespace . '\UserRepository\UserRepository',
        );
    }
}

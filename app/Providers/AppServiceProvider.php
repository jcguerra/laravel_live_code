<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\App\Modules\User\Providers\UserServiceProvider::class);
        $this->app->register(\App\Modules\Note\Providers\NoteServiceProvider::class);
        $this->app->register(\App\Providers\AuthServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}

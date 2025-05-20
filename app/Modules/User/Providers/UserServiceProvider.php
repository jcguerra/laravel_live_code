<?php

namespace App\Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Models\User;
use App\Modules\User\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('app/Modules/User/Routes/api.php'));
        $this->loadMigrationsFrom(base_path('app/Modules/User/Database/Migrations'));

        Gate::policy(User::class, UserPolicy::class);
    }
}

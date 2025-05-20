<?php

namespace App\Modules\Note\Providers;

use Illuminate\Support\ServiceProvider;

class NoteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('app/Modules/Note/Routes/api.php'));
        $this->loadMigrationsFrom(base_path('app/Modules/Note/Database/Migrations'));
    }
}

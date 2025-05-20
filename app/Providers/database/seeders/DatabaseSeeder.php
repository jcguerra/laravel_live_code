<?php

namespace App\Providers\database\seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(\App\Modules\User\Database\Seeders\UserSeeder::class);
        $this->call(\App\Modules\Note\Database\Seeders\NoteSeeder::class);
    }
}

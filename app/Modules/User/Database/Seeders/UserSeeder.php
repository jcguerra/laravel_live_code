<?php

namespace App\Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Modules\User\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Ana López', 'email' => 'ana@code.dev'],
            ['name' => 'Carlos Gómez', 'email' => 'carlos@code.dev'],
            ['name' => 'Lucía Pérez', 'email' => 'lucia@code.dev'],
            ['name' => 'Martín Torres', 'email' => 'martin@code.dev'],
            ['name' => 'Julia Fernández', 'email' => 'julia@code.dev'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password'),
                'phone' => '3434000000',
                'address' => 'Calle Falsa 123',
                'settings' => [
                    'theme' => 'light',
                    'notifications' => true,
                    'language' => 'es',
                ],
            ]);
        }
    }
}

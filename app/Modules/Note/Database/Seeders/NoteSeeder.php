<?php

namespace App\Modules\Note\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Modules\Note\Models\Note;
use App\Modules\User\Models\User;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        $notes = [
            [
                'title' => 'First Note',
                'content' => 'This is the content of the first note.',
                'status' => 'draft',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Second Note',
                'content' => 'This is the content of the second note.',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Third Note',
                'content' => 'This is the content of the third note.',
                'status' => 'archived',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Fourth Note',
                'content' => 'This is the content of the fourth note.',
                'status' => 'draft',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Fifth Note',
                'content' => 'This is the content of the fifth note.',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Sixth Note',
                'content' => 'This is the content of the sixth note.',
                'status' => 'archived',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Seventh Note',
                'content' => 'This is the content of the seventh note.',
                'status' => 'draft',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Eighth Note',
                'content' => 'This is the content of the eighth note.',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Ninth Note',
                'content' => 'This is the content of the ninth note.',
                'status' => 'archived',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
            [
                'title' => 'Tenth Note',
                'content' => 'This is the content of the tenth note.',
                'status' => 'draft',
                'user_id' => User::inRandomOrder()->first()->id,
            ],
        ];

        foreach ($notes as $note) {
            Note::create($note);
        }
    }
}

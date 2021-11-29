<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(\App\Models\User::class, 5)->create()->each(function($user){
            $thread = Thread::factory(\App\Models\Thread::class, 3)->make();

            $user->threads()->saveMany($thread);
        });
    }
}

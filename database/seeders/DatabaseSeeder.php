<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'bloked_user',
            'email'=> 'email@hack.net',
            'password'=> Hash::make('blocked_user')
        ]);
        
        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('administrador')
        ]);
        DB::table('users')->insert([
            'name'=> 'user',
            'email'=> 'user@user.com',
            'password'=> Hash::make('user1234')
        ]);
        DB::table('tasks')->insert([
            'description'=> 'abcd',
            'expiration'=> '2022-1-1',
        ]);
        \App\Models\Task::factory(10)->create();
        \App\Models\Log::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}

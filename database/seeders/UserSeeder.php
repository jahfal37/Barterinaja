<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => ('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User 1',
            'username' => 'user',
            'password' =>('password'),
            'role' => 'user',
        ]);
        
    }
    
}

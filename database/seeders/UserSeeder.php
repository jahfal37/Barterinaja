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
            'password' => ('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'password' =>('user1234'),
            'role' => 'user',
        ]);
        
    }
    
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         

        $users = collect([
            [
                'name' => 'Super Admin',
                'email' => 'admin@example.com', // Fixed email for login
                'username' => 'superadmin',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now(),
                'role' => 'SuperAdmin',
                'parent_id' => null, // SuperAdmin has no parent
            ],
            [
                'name' => 'Shop User',
                'email' => 'user1@shop.com',
                'username' => 'shopuser1',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now(),
                'role' => 'Shop',
                'parent_id' => NULL,
            ] 
        ]);

        $users->each(function ($user){
            User::insert($user);
        });
    }
}

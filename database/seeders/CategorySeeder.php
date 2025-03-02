<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User; 



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::where('role', 'SuperAdmin')->first();

        if (!$superAdmin) {
            $superAdmin = User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com', // Fixed email for login
                'username' => 'admin',
                'email_verified_at' => now(),
                'password' => bcrypt('admin@123'),
                'created_at' => now(),
                'role' => 'SuperAdmin',
                'parent_id' => null
            ]);
        }

        $categories = collect([
            [
                'id'    => 1,
                'name'  => 'Laptops',
                'slug'  => Str::slug('Laptops'),
                'code'  => 'CAT001',
                'user_id' => $superAdmin->id,  // Ensure SuperAdmin or relevant user ID
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 2,
                'name'  => 'Hardware',
                'slug'  => Str::slug('Hardware'),
                'code'  => 'CAT002',
                'user_id' => $superAdmin->id, 
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 3,
                'name'  => 'Smartphones',
                'slug'  => Str::slug('Smartphones'),
                'code'  => 'CAT003',
                'user_id' => $superAdmin->id, 
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 4,
                'name'  => 'Speakers',
                'slug'  => Str::slug('Speakers'),
                'code'  => 'CAT004',
                'user_id' => $superAdmin->id, 
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 5,
                'name'  => 'Software',
                'slug'  => Str::slug('Software'),
                'code'  => 'CAT005',
                'user_id' => $superAdmin->id, 
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
         

        $categories->each(function ($category){
            Category::insert($category);
        });
    }
}

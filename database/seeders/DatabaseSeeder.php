<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CurrencySeeder::class,   
            CategorySeeder::class,
            UnitSeeder::class,
            
        ]);

        /* $this->call([
                //UserSeeder::class,
            CategorySeeder::class,
            UnitSeeder::class,
            ProductSeeder::class
        ]); */

        /* $orders = Order::factory(50)->create();
        $customers = Customer::factory(30)
            ->recycle($orders)
            ->create();


        $purchases = Purchase::factory(60)->create();
        $suppliers = Supplier::factory(20)->create();

        $users = User::factory(10)
            ->recycle($suppliers)
            ->recycle($purchases)
            ->create(); */

        /* $admin = User::factory()->create([
           'name' => 'Super Admin',
            'email' => 'admin@admin.com', // Fixed email for login
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('kingwayz@123'),
            'created_at' => now(),
            'role' => 'SuperAdmin',
            'parent_id' => null
        ]); */

        /*
        for ($i=0; $i < 10; $i++) {
            Product::factory()->create([
                'product_code' => IdGenerator::generate([
                    'table' => 'products',
                    'field' => 'product_code',
                    'length' => 4,
                    'prefix' => 'PC'
                ]),
            ]);
        }
        */

    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('customers')->truncate();
        // truncate products trước tránh khoá ngoại, tự động reset ID
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(20)->create();
        Customer::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

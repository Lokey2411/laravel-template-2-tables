<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create();
            Product::create([
                'name' => $faker->name,
                'price' => $faker->numberBetween(1, 1000),
                'description' => $faker->text,
                'shopId' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
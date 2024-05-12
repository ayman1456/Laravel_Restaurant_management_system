<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $food = Food::create([
            'title' => 'Biriyani',
            'price' => 150,
            'detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, consequatur!',
            'image' => 'Food/Beef Burger.jpg',
        ]);

        $food->categories()->sync(1);
    }
}

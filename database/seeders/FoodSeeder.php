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
            'title' => 'Beef Burger',
            'price' => 149,
            'detail' => 'Signature Beef Burger: Sink your teeth into our mouthwatering Signature Beef Burger, 
            a tantalizing creation crafted with the finest ground beef, expertly seasoned and grilled to 
            perfection. Nestled between freshly toasted brioche buns, this culinary masterpiece features a 
            juicy beef patty, layered with melted cheddar cheese, crisp lettuce, ripe tomato slices, crunchy 
            pickles, and a slathering of our secret house sauce, adding a perfect balance of tangy and savory 
            flavors. Served with a side of golden fries or a vibrant garden salad, this burger is a celebration 
            of classic American comfort food elevated to gourmet excellence.',
            'image' => 'Food/Beef Burger.jpg',
        ]);

        $food->categories()->sync(1);

        $food = Food::create([
            'title' => 'Chawmein',
            'price' => 289,
            'detail' => 'Sizzling Chicken Chow Mein: Prepare your taste buds for a journey to the bustling streets of Asia with our tantalizing Sizzling Chicken Chow Mein. Tender strips of succulent chicken breast are wok-fried to perfection with an aromatic medley of crisp vegetables, including vibrant bell peppers, crunchy carrots, and crisp bean sprouts,',
            'image' => 'Food/Cahowmien.jpg',
        ]);

        $food->categories()->sync(1);

        

        $food = Food::create([
            'title' => 'Cajun Shrimp',
            'price' => 559,
            'detail' => 'Cajun Shrimp Delight: Experience a burst of Southern flavor with our Cajun Shrimp Delight, a culinary sensation that will tantalize your taste buds. Plump and succulent shrimp are marinated in a blend of traditional Cajun spices, including paprika, cayenne pepper, garlic, and thyme, imparting a bold and zesty flavor profile. Sautéed to perfection in a sizzling skillet, the shrimp are served atop a bed of fluffy white rice, accompanied by a colorful array of sautéed bell peppers, onions, and juicy cherry tomatoes. Finished with a drizzle of tangy lemon butter sauce and a sprinkle of fresh parsley, this dish is a celebration of Louisianas vibrant culinary heritage. Dive into a taste sensation that is spicy, savory, and utterly irresistible.',
            'image' => 'Food/Cajun Shrimp.jpg',
        ]);

        $food->categories()->sync(1);


        $food = Food::create([
            'title' => 'Chicken Karai',
            'price' => 249,
            'detail' => 'Sizzling Chicken Karahi: Indulge in the rich and aromatic flavors of South Asia with our mouthwatering Chicken Karahi. Tender pieces of succulent chicken are simmered to perfection in a traditional karahi (wok) with a fragrant blend of spices, including ginger, garlic, coriander, and cumin, creating a symphony of savory goodness. Slow-cooked with vibrant tomatoes, onions, and green chilies, this dish boasts a perfect balance of heat and tanginess that will leave your taste buds tingling with delight. Garnished with fresh cilantro and served sizzling hot in a traditional cast-iron karahi, our Chicken Karahi promises an authentic culinary experience that will transport you to the bustling streets of the Indian subcontinent. Pair it with fluffy naan bread or steamed basmati rice for a truly unforgettable meal',
            'image' => 'Food/chicken karai.jpg',
        ]);

        $food->categories()->sync(1);
    }
}

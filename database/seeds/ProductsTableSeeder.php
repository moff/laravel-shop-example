<?php

use App\Category;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $categories = Category::all();

        factory(Product::class, 50)->make()->each(function($product) use ($categories, $users) {
            $product->category_id = $categories->random()->id;
            $product->user_id = $users->random()->id;
            $product->save();
        });
    }
}

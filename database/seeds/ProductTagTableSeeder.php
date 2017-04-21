<?php

use App\Product;
use App\Tag;
use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $tags  = Tag::all();

        foreach ($products as $product) {
            $tag = $tags->random();
            $product->tags()->save($tag);
        }
    }
}

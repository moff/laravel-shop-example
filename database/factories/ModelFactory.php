<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(20),
        'description' => $faker->text(120),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(20),
        'description' => $faker->text(120),
        'price' => $faker->randomFloat(2, 5, 1000),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(20),
    ];
});
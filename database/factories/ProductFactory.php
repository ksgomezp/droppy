<?php

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categoryId = Category::inRandomOrder()->value('id');

    return [
        'name' => $faker->company,
        'description' => $faker->sentence,
        'image' => $faker->image('public/storage/', 640, 480, null, false),
        'categoryId' => $categoryId,
        'stock' => $faker->numberBetween(0, 500),
        'price' => $faker->randomFloat(2, 0, 999.99)
    ];
});

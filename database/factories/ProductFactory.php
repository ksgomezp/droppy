<?php

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->sentence,
        'image' => $faker->word . '.png',
        // 'image' => $faker->image('public/storage/', 640, 480, null, false),
        'categoryId' => function () {
            return factory(Category::class)->create()->id;
        },
        'stock' => $faker->numberBetween(0, 500),
        'price' => $faker->randomFloat(2, 0, 999.99)
    ];
});

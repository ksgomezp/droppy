<?php

use App\Product;
use Faker\Generator as Faker;
use Illiminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->company,
        'category' => $faker->company,
        'stock' => $faker->numberBetween($min = 0, $max = 500),
        'price' => $faker->numberBetween($min = 1, $max = 5000),
    ];
});

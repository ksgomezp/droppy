<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Comment::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->value('id');
    return [
        'description' => $faker->realText,
        'productId' => $product,
    ];
});

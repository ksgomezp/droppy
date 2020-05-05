<?php

use App\Comment;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->value('id');
    return [
        'content' => $faker->sentence,
        'productId' => $product,
    ];
});

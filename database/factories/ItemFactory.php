<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Product;
use App\Receipt;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Item::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->value('id');
    $receipt = Receipt::inRandomOrder()->value('id');
    return [
            'quantity' => $faker->numberBetween(0, 500),
            'subtotal' => $faker->randomFloat(2, 0, 999),
            'productId' => $product,
            'receiptId' => $receipt
    ];
});

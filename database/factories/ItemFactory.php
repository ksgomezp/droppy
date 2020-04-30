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
    $quantity = $faker->numberBetween(0, 500);
    return [
            'quantity' => $quantity,
            'subtotal' => $product->getPrice()*$quantity,
            'productId' => $product,
            'receiptId' => $receipt
    ];
});

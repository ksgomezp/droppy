<?php

use App\Item;
use App\Product;
use App\Receipt;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    $product = Product::all()->random(1)->first();
    //$receipt = Receipt::inRandomOrder()->value('id');
    $quantity = $faker->numberBetween(0, 500);
    $receiptId = $faker->numberBetween(0, 10);

    return [
        'quantity' => $quantity,
        'subtotal' => $product->getPrice() * $quantity,
        'productId' => $product->getId(),
        'receiptId' => $receiptId
    ];
});

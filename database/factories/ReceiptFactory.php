<?php

use App\Receipt;
use App\User;
use App\Address;
use App\Item;
use Faker\Generator as Faker;

$factory->define(Receipt::class, function (Faker $faker) {
    $user = User::inRandomOrder()->value('id');
    $address = Address::inRandomOrder()->value('id');
    $item = factory(Item::class)->create();
    return [
        'totalAmount' => $item->getSubtotal(),
        'userId' => $user,
        'addressId' => $address,
        'itemId' => $item
    ];
});

<?php

use App\Receipt;
use App\User;
use App\Address;
use App\Item;
use Faker\Generator as Faker;

$factory->define(Receipt::class, function (Faker $faker) {
    $user = User::inRandomOrder()->value('id');
    $address = Address::inRandomOrder()->value('id');
    $items = Item::all()->random(4);
    return [
        'totalAmount' => $items->sum('subTotal'),
        'userId' => $user,
        'addressId' => $address
    ];
});

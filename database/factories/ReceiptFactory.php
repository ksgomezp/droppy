<?php

use App\Receipt;
use App\User;
use App\Address;
use App\Item;
use Faker\Generator as Faker;

$factory->define(Receipt::class, function (Faker $faker) {
    $user = User::inRandomOrder()->value('id');
    $address = Address::inRandomOrder()->value('id');
    return [
        'totalAmount' => 500,
        'userId' => $user,
        'addressId' => $address,
        'itemId' => function () {
            return factory(Item::class)->create()->id;
        }
    ];
});

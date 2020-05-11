<?php

use App\Address;
use App\City;
use App\User;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    $user = User::all()->random(1)->first();

    return [
        'deliveryAddress' => $faker->address,
        'postalCode' => $faker->numberBetween(0, 999999),
        'userId' => $user->getId(),
        'cityId' => function () {
            return factory(City::class)->create()->id;
        }
    ];
});

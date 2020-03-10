<?php

use App\Address;
use Faker\Generator as Faker;
use Illiminate\Support\Str;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'state' => $faker->state,
        'city' => $faker->city,
        'deliveryAddress' => $faker->address,
        'postalCode' => $faker->postcode,
    ];
});
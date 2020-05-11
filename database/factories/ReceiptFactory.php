<?php

use App\User;
use App\Receipt;
use App\Item;
use App\Address;
use App\Country;
use App\State;
use App\City;
use Faker\Generator as Faker;

$factory->define(Receipt::class, function (Faker $faker) {
    $user = User::inRandomOrder()->value('id');

    $address = Address::inRandomOrder()->first();
    $city = City::findOrFail($address->getCityId());
    $state = State::findOrFail($city->getStateId());
    $country = Country::findOrFail($state->getCountryId());

    $items = Item::all()->random(4);

    return [
        'totalAmount' => $items->sum('subtotal'),
        'address' => $country->getName() . ', ' . $state->getName() . ', ' . $city->getName() . ' - ' . $address->getDeliveryAddress(),
        'userId' => $user,
    ];
});

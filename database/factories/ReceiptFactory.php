<?php

use App\User;
use App\Receipt;
use App\Item;
use App\Address;
use App\Country;
use App\State;
use App\City;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Receipt::class, function (Faker $faker) {
    $receipt = new Receipt();
    $items = [];
    for ($i=0; $i < $faker->numberBetween(0, 4)  ; $i++) { 
        $product = Product::all()->random(1)->first();
        $quantity = $faker->numberBetween(0, 500);
        $item = new Item();
        $item->setQuantity($quantity);
        $item->setSubtotal($product->getPrice() * $quantity);
        $item->setProductId($product->getId());
        $item->setReceiptId($receipt->getId());
        $item->save();
        $items->push($item);
    }

    $totalAmount = 0;
    foreach ($items as $item) {
        $totalAmount+= $item->getSubtotal();
    }

    $user = User::inRandomOrder()->value('id');
    $address = Address::inRandomOrder()->first();
    $city = City::findOrFail($address->getCityId());
    $state = State::findOrFail($city->getStateId());
    $country = Country::findOrFail($state->getCountryId());


    return [
        'totalAmount' => $totalAmount,
        'address' => $country->getName() . ', ' . $state->getName() . ', ' . $city->getName() . ' - ' . $address->getDeliveryAddress(),
        'userId' => $user,
    ];
});

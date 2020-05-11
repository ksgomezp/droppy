<?php

use App\User;
use App\Receipt;
use App\Item;
use App\Address;
use App\Country;
use App\Product;
use App\State;
use App\City;
use Faker\Generator as Faker;

$factory->define(Receipt::class, function (Faker $faker) {
    $user = User::all()->random(1)->first();

    $address = Address::inRandomOrder()->first();
    $city = City::findOrFail($address->getCityId());
    $state = State::findOrFail($city->getStateId());
    $country = Country::findOrFail($state->getCountryId());

    $randomNum = $faker->numberBetween(1, 3);

    $receipt = new Receipt();
    $receipt->setTotalAmount(0);
    $receipt->setUserId($user->getId());
    $receipt->setAddress($country->getName() . ', ' . $state->getName() . ', ' . $city->getName() . ' - ' . $address->getDeliveryAddress());
    $receipt->save();

    $totalAmount = 0;
    for ($i = 0; $i < $randomNum; $i++) {
        $product = Product::all()->random(1)->first();

        while ($product->getStock() < 1) {
            $product = Product::all()->random(1)->first();
        }

        $quantity = $faker->numberBetween(1, $product->getStock() / 2);

        $item = new Item();
        $item->setQuantity($quantity);
        $item->setProductId($product->getId());
        $item->setSubtotal($product->getPrice() * $quantity);
        $item->setReceiptId($receipt->getId());
        $item->save();

        $product->setStock($product->getStock() - $quantity);
        $product->save();

        $totalAmount += $item->getSubtotal();
    }

    while ($user->getWallet() < $totalAmount) {
        $user = User::all()->random(1)->first();
    }

    $receipt->setTotalAmount($totalAmount);
    $receipt->setUserId($user->getId());
    $receipt->save();

    $user->setWallet($user->getWallet() - $totalAmount);
    $user->save();

    return [
        'totalAmount' => 0,
        'address' => '',
        'userId' => $user->getId(),
    ];
});

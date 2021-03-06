<?php

use App\City;
use App\State;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'stateId' => function () {
            return factory(State::class)->create()->id;
        }
    ];
});

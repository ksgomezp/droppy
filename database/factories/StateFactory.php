<?php

use App\Country;
use App\State;
use Faker\Generator as Faker;

$factory->define(State::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
        'countryId' => function () {
            return factory(Country::class)->create()->id;
        }
    ];
});

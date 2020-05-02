<?php

use App\Country;
use App\State;
use Faker\Generator as Faker;
use Illiminate\Support\Str;

$factory->define(State::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
        'countryId' => function () {
            return factory(Country::class)->create()->id;
        }
    ];
});

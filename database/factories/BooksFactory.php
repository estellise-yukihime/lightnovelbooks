<?php

use Faker\Generator as Faker;

$factory->define(App\Books::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->text(25),
        'author_id' => $faker->biasedNumberBetween(5, 10)
    ];
});

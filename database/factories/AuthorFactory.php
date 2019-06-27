<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->text(25),
        'pen_name' => $faker->text(25)
    ];
});

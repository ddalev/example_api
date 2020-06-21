<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ExampleMembers::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'country' => $faker->country(),
        'birth_date' => $faker->date('Y-m-d'),
    ];
});

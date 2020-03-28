<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    return [
        //generate fake data
        'title'=>$faker->sentence(5),
        'description'=>$faker->text(),
        'trainer'=>$faker->name,
    ];
});

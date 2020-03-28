<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->sentence(5),
        'desc'=>$faker->text(),
        'trainer'=>$faker->name,
    ];
});

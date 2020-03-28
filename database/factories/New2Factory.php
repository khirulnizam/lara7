<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\New2;
use Faker\Generator as Faker;

$factory->define(New2::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->name,
        'department'=> $faker->sentence(5),
        'dob'=>$faker.date.past(10, '2010-01-01'),
    ];
});

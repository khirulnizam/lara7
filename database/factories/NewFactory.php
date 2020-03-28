<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
//use App\New2;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->name,
        'department'=> $faker->department,
        'dob'=>$faker.date.past(10, '2010-01-01'),
    ];
});

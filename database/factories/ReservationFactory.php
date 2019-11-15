<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'people' => random_int(1,8),
        'date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'time' => now(),
        'comment' => $faker->text(20),

    ];
});

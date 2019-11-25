<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MainCourse;
use App\Order;
use App\Product;
use App\Receipt;
use App\Reservation;
use App\Reservation_table;
use App\SubCourse;
use App\Table;
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


$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'active'            => 1,
        'remember_token'    => Str::random(10),
    ];
});
$factory->define(Table::class, function (Faker $faker) {
    return [
        'max_capacity' => random_int(1, 8),
        'min_capacity' => 1,
    ];
});


$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'people'  => random_int(1, 8),
        'date'    => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'time'    => now(),
        'comment' => $faker->text(20),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },

    ];
});
$factory->define(Reservation_table::class, function (Faker $faker) {
    static $order = 1;

    return [
        'table_id'       => Table::all()->random()->id,
        'reservation_id' => $order++,
    ];
});

$factory->define(Receipt::class, function (Faker $faker) {
    static $order = 1;

    return [
        'payment'         => $faker->randomDigit,
        'amount_recieved' => $faker->randomDigit,
        'reservation_id'  => $order++,
    ];
});

$factory->define(MainCourse::class, function (Faker $faker) {

    $array = ['Voorgerecht', 'Hoofdgerecht', 'Nagerecht'];

    return [
        'name'  => $array[random_int(0, 2)],
    ];
});

$factory->define(SubCourse::class, function (Faker $faker) {

    return [
        'name'  => $faker->name,
        'main_course_id' => MainCourse::all()->random()->id
    ];
});

$factory->define(Product::class, function (Faker $faker) {

    return [
        'name'  => $faker->name,
        'price' => $faker->randomDigit,
        'sub_course_id' => SubCourse::all()->random()->id
    ];
});

$factory->define(Order::class, function (Faker $faker) {
    return [
        'quantity'   => random_int(1, 8),
        'receipt_id' => Receipt::all()->random()->id,
        'product_id' => Product::all()->random()->id,

    ];
});

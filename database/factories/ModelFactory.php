<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Products::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(2),
        'short' => $faker->unique()->safeEmailtext(140),
        'body' => $faker->text(900),
    ];
});

use Carbon\Carbon;

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $date_start = $faker->dateTimeThisYear();
    $date_end = new Carbon($date_start->format('r'));
    return [
        'title' => $faker->sentence(4),
        'start' =>  $date_start,
        'end' =>  $date_end->addHours($faker->numberBetween(1, 35)),
        'color' => $faker->hexColor
    ];
});

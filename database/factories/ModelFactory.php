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

use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Events::class, function (Faker\Generator $faker) {
    $startTime = Carbon::createFromTimeStamp($faker->dateTimeBetween('now', '+1 month')->getTimestamp());
    return [
        'name' => $faker->word,
        'starts_at' => $startTime,
        'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s', $startTime)->addHours(2),
        'status' => 'CONFIRMED',
        'summary' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'location' => $faker->word,
        'uid' => $faker->domainName,
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString()
    ];
});

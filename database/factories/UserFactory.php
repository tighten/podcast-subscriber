<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    $channel = array_random(['facebook', 'sms']);
    return [
        'phone_number' => $channel == 'sms' ? $faker->e164PhoneNumber() : null,
        'facebook' => $channel == 'facebook' ? '123?' : null,
    ];
});

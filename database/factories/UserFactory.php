<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'country' => Str::random(10),
        'state' => $faker->name,
        'city' => $faker->name,
        'pincode' => "",
        'photo' => "",
        'password' => '$2a$10$bbKFhSebcyX3s0iPuAusB.iUn02tUMCRmf.5re8cvynF5XznnEQ/q', // password is 12345
        'confirm_password' => '$2a$10$bbKFhSebcyX3s0iPuAusB.iUn02tUMCRmf.5re8cvynF5XznnEQ/q', // password is 12345
        'is_admin' => 0,
        'is_client' => 1,
        'is_vendor' => 0,
        'is_user' => 0,
        'status' => 1,
        'remember_token' => Str::random(10),
    ];
});

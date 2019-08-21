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
    $status = array('ACTIVE','INACTIVE','DISABLED');
    $genre = array('MALE','FEMALE','OTHER');
    $type = array('ADMIN','CLIENT','MASTER');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'status' => $status[rand(0,2)],
        'type' => $type[rand(0,2)],
        'date_birth' => '19'.rand(5,9).rand(1,9)."-0".rand(1,9).'-0'.rand(1,9),
        'genre' => $genre[rand(0,2)],
    ];
});

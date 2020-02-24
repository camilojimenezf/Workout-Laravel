<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Athlete;
use App\Trainer;
use App\Plan;
use App\Subscription;
use App\TrainerPlan;
use App\Profile;
use App\Routine;
use App\Training;
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
        'name' => $faker->name,
        'surname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Athlete::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'level' => $faker->randomElement(['BEGINNER','MEDIUM','PRO']),
        'points' => $faker->randomDigit,
    ];
});

$factory->define(Trainer::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'certification' => $faker->randomElement(['Univeristy of Columbia','Trainer pro','Master in Sports']),
        'score' => $faker->randomDigit,
        'description' => $faker->text(100)
    ];
});


$factory->define(Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomDigit,
    ];
});


$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'plan_id' => Plan::all()->random()->id,
        'athlete_id' => Athlete::all()->random()->id,
        'enabled' => $faker->randomElement([true,false]),
        'expiration_date' => $faker->date()
    ];
});

$factory->define(TrainerPlan::class, function (Faker $faker) {
    return [
        'plan_id' => Plan::all()->random()->id,
        'trainer_id' => Trainer::all()->random()->id,
    ];
});

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'athlete_id' => Athlete::all()->random()->id,
        'weight' => $faker->randomDigit,
        'height' => $faker->randomDigit,
        'body_fat' => $faker->randomDigit
    ];
});
$factory->define(Routine::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->word,
        'duration' => $faker->word,
        'frequency' => $faker->word
    ];
});
$factory->define(Training::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->word,
        'duration' => $faker->word,
    ];
});

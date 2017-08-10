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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function(Faker\Generator $faker){

	return [
		'username'       => $faker->userName,
		'password'       => bcrypt('secret'),
		'email'          => $faker->unique()->safeEmail,
		'activated'      => 1,
		'isReal'         => (string)0,
		'remember_token' => str_random(10),
		'created_at'     => date("Y-m-d H:i:s"),
	];
});

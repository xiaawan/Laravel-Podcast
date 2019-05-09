<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Podcast;
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

$factory->define(App\Podcast::class, function (Faker $faker) {
	return [
		'name' => 'Test Name', 
		'description' => 'Test Description',
		'marketing_url' => 'http://podcast-test.com/marketing-1',
		'feed_url' => 'http://podcast-test.com/feed-1',
	];
});

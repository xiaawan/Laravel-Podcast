<?php

use Illuminate\Database\Seeder;
use App\Podcast;

class PodcastTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Truncate table
		Podcast::truncate();

		$faker = \Faker\Factory::create();

		for ($i = 0; $i < 50; $i++) {
			Podcast::create([
				'name' => $faker->sentence,
				'description' => $faker->paragraph,
				'marketing_url' => 'http://podcast-test.com/marketing-' . $i,
				'feed_url' => 'http://podcast-test.com/feed-' . $i,
			]);
		}
	}
}

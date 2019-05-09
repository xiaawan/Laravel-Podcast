<?php

//namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PodcastTest extends TestCase
{
	/**
	 * A basic unit test example.
	 *
	 * @return void
	 */

	use DatabaseMigrations;

	public function testsPodcastsAreCreatedCorrectly()
	{
		$payload = [
			'name' => 'Test Name',
			'description' => 'Test Description',
			'marketing_url' => 'http://podcast-test.com/marketing-1',
			'feed_url' => 'http://podcast-test.com/feed-1',
		];

		$this->json('POST', '/api/podcasts', $payload)
			->assertStatus(201)
			->assertJson([
				'name' => 'Test Name', 
				'description' => 'Test Description',
				'marketing_url' => 'http://podcast-test.com/marketing-1',
				'feed_url' => 'http://podcast-test.com/feed-1',
			]);
	}

	public function testsPodcastAreUpdatedCorrectly()
	{
		
		$podcast = factory(App\Podcast::class)->create([
			'name' => 'Test Name', 
			'description' => 'Test Description',
			'marketing_url' => 'http://podcast-test.com/marketing-1',
			'feed_url' => 'http://podcast-test.com/feed-1',
		]);

		$payload = [
			'name' => 'Test Name updated', 
			'description' => 'Test Description updated',
			'marketing_url' => 'http://podcast-test.com/marketing-1-updated',
			'feed_url' => 'http://podcast-test.com/feed-1-updated',
		];

		$response = $this->json('PUT', '/api/podcasts/' . $podcast->id, $payload)
			->assertStatus(200)
			->assertJson($payload);
	}

	public function testsPodcastsAreDeletedCorrectly()
	{
		$podcast = factory(App\Podcast::class)->create([
			'name' => 'Test Name', 
			'description' => 'Test Description',
			'marketing_url' => 'http://podcast-test.com/marketing-1',
			'feed_url' => 'http://podcast-test.com/feed-1',
		]);

		$this->json('DELETE', '/api/podcasts/' . $podcast->id)
			->assertStatus(204);
	}

	public function testsPodcastsStatusUpdatedSuccessfully()
	{
		$podcast = factory(App\Podcast::class)->create([
			'name' => 'Test Name', 
			'description' => 'Test Description',
			'marketing_url' => 'http://podcast-test.com/marketing-1',
			'feed_url' => 'http://podcast-test.com/feed-1',
		]);

		$this->json('PUT', '/api/podcasts/approve/' . $podcast->id)
			->assertStatus(200);
	}
}

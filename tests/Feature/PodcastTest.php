<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PodcastFeatureTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testPodcastsPublishedStatus()
	{
		$response = $this->get('/api/podcasts/published');

		$response->assertStatus(200);
	}

	public function testPodcastsReviewStatus()
	{
		$response = $this->get('/api/podcasts/review');

		$response->assertStatus(200);
	}

	public function testPodcastsBrowseRecords()
	{
		$podcast = factory(App\Podcast::class)->create();

		$response = $this->get('/api/podcasts/review');
		$response->assertSee($podcast->name);
	}
}

<p>Clone master repo</p>
<p>Use "update composer" command to install dependencies</p>
<p>Create an alias for your laravel instance for example "http://podcast.test"</p>
<p>Create database and use it in your .env file</p>
<p>Setup your db for phpunit also in /phpunit.xml</p>
<p>Run ./vendor/bin/phpunit for testing</p>
<p>Run "php artisan migrate" command to create tables</p>
<p>Run "php artisan db:seed --class=PodcastTableSeeder" to create dummy records</p>

<p>
	<b>API URLs.</b>

	GET: http://podcast.test/podcasts/
	GET: http://podcast.test/api/podcasts/review
	GET: http://podcast.test/api/podcasts/published
	
	GET: http://podcast.test/api/podcasts/review?page=2
	
	GET: http://podcast.test/api/podcasts/published?page=2

</p>

<p>Sample Payload</p>
<p>
	POST: http://podcast.test/api/podcasts
</p>
<p>
	{"name":"Test Name", "description": "Test Description", "marketing_url": "http://abc.com/marketing-url", "feed_url": "http://abc.com/feed-url"}
</p>

<p>
	PUT: http://podcast.test/api/podcasts/approve/{id}
</p>

<p>
	DELETE: http://podcast.test/api/podcasts/delete/{id}
</p>
<p>
	Podcast Comments are yet to be done
</p>
<p>
	Around 6 hours were spent so far.
</p>
<p>
	Some improvements require on error messages and API version
</p>

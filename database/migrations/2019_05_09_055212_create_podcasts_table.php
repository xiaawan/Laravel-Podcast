<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('podcasts', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 255);
			$table->text('description')->nullable();
			$table->string('marketing_url', 255)->nullable();
			$table->string('feed_url', 255);
			$table->string('image', 255)->nullable();
			$table->string('status', 10)->default('review');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('podcasts');
	}
}

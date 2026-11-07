<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
		{
			Schema::create('story_pages', function (Blueprint $table) {
				$table->id();

				// বর্তমান StoryController-এর story ID:
				// যেমন “একজন বুদ্ধিমান বালক” = 2
				$table->unsignedInteger('story_id')->index();

				$table->unsignedSmallInteger('page_number');

				$table->text('paragraph');

				// এখন local public path, পরে Cloudflare URL দেওয়া যাবে।
				$table->string('image_url')->nullable();
				$table->string('audio_url')->nullable();

				$table->timestamps();

				$table->unique(['story_id', 'page_number']);
			});
		}
		

    /**
     * Reverse the migrations.
     */
	 
    public function down(): void
    {
        Schema::dropIfExists('story_pages');
    }
};

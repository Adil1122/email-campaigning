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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('keyword')->nullable();
            $table->string('business_name')->nullable();
            $table->text('url')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('category')->nullable();
            $table->string('ratings')->nullable();
            $table->string('reviews')->nullable();
            $table->string('page_number')->nullable();
            $table->text('google_map_link')->nullable();
            $table->string('google_email_1')->nullable();
            $table->string('google_email_2')->nullable();
            $table->string('google_email_3')->nullable();
            $table->string('google_email_4')->nullable();
            $table->string('google_email_5')->nullable();
            $table->string('google_email_6')->nullable();
            $table->string('google_email_7')->nullable();
            $table->string('captcha_free_email_1')->nullable();
            $table->string('captcha_free_email_2')->nullable();
            $table->string('captcha_free_email_3')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('contact_us_page')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};

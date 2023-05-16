<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySocialmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_socialmedia', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('tiktok');
            $table->string('youtube_profile');
            $table->string('youtube_video');
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
        Schema::dropIfExists('company_socialmedia');
    }
}

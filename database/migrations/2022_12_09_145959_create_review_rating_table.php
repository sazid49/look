<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('review_rating')) {
            Schema::create('review_rating', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('review_id');
                $table->bigInteger('review_criteria_id');
                $table->bigInteger('listing_id');
                $table->enum('listing_type', ['company','place']);
                $table->string('rating', 191);
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_rating');
    }
}

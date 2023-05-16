<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCategoryCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_category_criteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_criteria-id');
            $table->unsignedBigInteger('category_id');
            $table->enum('listing_type',['company','place']);
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
        Schema::dropIfExists('review_category_criteria');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('review_criteria')) {
            Schema::create('review_criteria', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('description_en', )->nullable();
                $table->string('description_fr', )->nullable();
                $table->string('description_de', )->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('review_criteria');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOfferFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_fields', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('label');
            $table->enum('type',['text','textarea','dropdown','checkbox','radio']);
			$table->text('option')->nullable();
			$table->tinyInteger('is_required');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_fields');
    }
}

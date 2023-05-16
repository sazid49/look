<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('offer_fields')) {
            Schema::create('offer_fields', function (Blueprint $table) {
                $table->id();
                $table->integer('category_id');
                $table->string('label_en', 191)->default(null);
                $table->string('label_de', 191);
                $table->string('label_fr', 191)->default(null);
                $table->string('label_it', 191)->default(null);
                $table->enum('type', ['text','textarea','dropdown','checkbox','radio']);
                $table->text('option')->default(null);
                $table->tinyInteger('is_required')->default(0);
                $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('offer_fields');
    }
}

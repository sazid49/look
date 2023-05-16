<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOfferFieldAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_offers_field_answer')) {
            Schema::create('company_offers_field_answer', function (Blueprint $table) {
                $table->id();
                $table->integer('company_offer_id');
                $table->integer('offerfield_id');
                $table->text('answer');
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
        Schema::dropIfExists('company_offers_field_answer');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_offers')) {
            Schema::create('company_offers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('company_id');
                $table->boolean('gen_privateperson')->comment('If 0 = private, 1 = company')->nullable();
                $table->string('gen_company_name', 255)->comment('Here is the name for company, organisation ect.. Also not only for company.')->nullable();
                $table->string('gen_salutation', 255)->nullable();
                $table->string('gen_firstname', 255)->nullable();
                $table->string('gen_lastname', 255)->nullable();
                $table->string('gen_postcode', 255)->nullable();
                $table->string('gen_city', 255)->nullable();
                $table->string('gen_email', 255)->nullable();
                $table->string('gen_phone', 255)->nullable();
                $table->tinyInteger('it_offer_newwebsite')->nullable();
                $table->tinyInteger('it_offer_redesign')->nullable();
                $table->tinyInteger('it_offer_newfunctions')->nullable();
                $table->tinyInteger('it_offer_mobileapp')->nullable();
                $table->tinyInteger('it_offer_onlineshop')->nullable();
                $table->tinyInteger('it_offer_graphics')->nullable();
                $table->tinyInteger('it_offer_printmedia')->nullable();
                $table->tinyInteger('it_offer_consultation')->nullable();
                $table->string('it_manage', 255)->nullable();
                $table->string('it_hosting', 255)->nullable();
                $table->string('it_texts', 255)->nullable();
                $table->string('it_images', 255)->nullable();
                $table->string('it_completion', 255)->nullable();
                $table->text('message')->nullable();
                $table->tinyInteger('agb')->nullable();
                $table->string('actual_link', 255)->nullable();
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
        Schema::dropIfExists('company_offers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category')->nullable();
            $table->string('rubric')->nullable();
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('post_office_box')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('longitude');
            $table->string('latitude');
            $table->string('canton')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('description_de')->nullable();
            $table->string('description_fr')->nullable();
            $table->string('description_it')->nullable();
            $table->string('description_en')->nullable();
            $table->string('abstract')->nullable();
            $table->string('tags')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('payer')->nullable();
            $table->string('not_payer_reason')->nullable();
            $table->string('price_contract')->nullable();
            $table->string('price_actual')->nullable();
            $table->string('notes')->nullable();
            $table->string('foundingyear')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('agent')->nullable();
            $table->string('assigned_to')->nullable();
            $table->boolean('show_interraction')->default(1);
            $table->boolean('show_jobs', 4)->default(1);
            $table->string('info_1')->nullable();
            $table->longText('opening_hours')->nullable();
            $table->string('slug')->nullable();
            $table->integer('hits')->default(0);
            $table->tinyInteger('active')->nullable();
            $table->tinyInteger('claimed')->default(0);
            $table->tinyInteger('claimed_by')->nullable();
            $table->tinyInteger('published')->default(0);
            $table->dateTime('claimed_on')->nullable();
            $table->boolean('show_rating')->default(1);
            $table->string('inserted_by', 155);
            $table->string('updated_by');
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
        Schema::dropIfExists('company');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_contact', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('gen_private_person');
            $table->integer('company_id');
            $table->string('gen_company_name',255)->nullable();
            $table->string('gen_salutation',255)->nullable();
            $table->string('gen_firstname',255);
            $table->string('gen_lastname',255);
            $table->string('gen_postcode',255)->nullable();
            $table->string('gen_city',255)->nullable();
            $table->string('gen_email',255);
            $table->string('gen_phone',255);
            $table->text('message',255);
            $table->string('agb',255);
            $table->string('actual_link',255)->nullable();
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
        Schema::dropIfExists('company_contact');
    }
}

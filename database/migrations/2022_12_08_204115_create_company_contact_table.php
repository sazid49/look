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
        if (!Schema::hasTable('company_contacts')) {
            Schema::create('company_contacts', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('gen_private_person')->nullable();
                $table->integer('company_id');
                $table->string('gen_company_name')->nullable();
                $table->string('gen_salutation',10)->nullable();
                $table->string('gen_firstname');
                $table->string('gen_lastname');
                $table->tinyInteger('gen_postcode')->nullable();
                $table->string('gen_city')->nullable();
                $table->string('gen_email');
                $table->string('gen_phone',20)->nullable();
                $table->text('message')->nullable();
                $table->tinyInteger('agb')->default('1');
                $table->string('actual_link')->nullable();
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
        Schema::dropIfExists('company_contacts');
    }
}

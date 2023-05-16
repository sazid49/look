<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('as_user_details')) {
            Schema::create('as_user_details', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id');
                $table->string('company_name',191)->nullable();
                $table->string('firstname',191);
                $table->string('lastname',191);
                $table->string('address',191)->nullable();
                $table->integer('postcode')->nullable();
                $table->string('city',191)->nullable();
                $table->string('phone',20)->nullable();
                $table->date('birthday')->nullable();
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
        Schema::dropIfExists('as_user_details');
    }
}

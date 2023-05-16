<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_jobs')) {
            Schema::create('company_jobs', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->string('title');
                $table->string('location')->nullable();
                $table->date('start_date')->nullable();
                $table->date('expire_date')->nullable();
                $table->enum('type',['FullTime','PartTime']);
                $table->text('description');
                $table->text('skill')->nullable();
                $table->tinyInteger('active')->default('0');
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
        Schema::dropIfExists('company_jobs');
    }
}

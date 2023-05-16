<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('client_jobs')) {
            Schema::create('client_jobs', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->integer('job_id');
                $table->string('title',10)->nullable();
                $table->string('firstname',191);
                $table->string('lastname',191);
                $table->integer('postcode');
                $table->string('city',191);
                $table->string('email',191);
                $table->string('phone',20)->nullable();
                $table->date('date_of_birth')->nullable();
                $table->string('civil_status',20)->nullable();
                $table->string('motivation_letter')->nullable();
                $table->string('CV')->nullable();
                $table->string('certificate_of_employment')->nullable();
                $table->string('diplomas_and_certificates')->nullable();
                $table->text('message')->nullable();
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
        Schema::dropIfExists('client_jobs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('applications')) {
            Schema::create('applications', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('job_id');
                $table->string('title', 20);
                $table->string('firstname', 50);
                $table->string('lastname', 50);
                $table->string('postcode', 50)->nullable();
                $table->string('city', 50)->nullable();
                $table->string('email', 50);
                $table->string('phone', 50);
                $table->string('date_of_birth', 50);
                $table->string('civil_status', 255)->nullable();
                $table->string('motivation_letter', 255);
                $table->string('CV', 255);
                $table->string('certificate_of_employment', 255);
                $table->string('diplomas_and_certificates', 255);
                $table->text('message');
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
        Schema::dropIfExists('applications');
    }
}

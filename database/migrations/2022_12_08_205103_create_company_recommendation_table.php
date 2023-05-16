<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRecommendationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_recommendations')) {
            Schema::create('company_recommendations', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->string('company_name');
                $table->string('contact_name')->nullable();
                $table->string('relationship')->nullable();
                $table->string('phone',20)->nullable();
                $table->string('email',191)->nullable();
                $table->string('status',60)->default('New');
                $table->text('comment')->nullable();
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
        Schema::dropIfExists('company_recommendations');
    }
}

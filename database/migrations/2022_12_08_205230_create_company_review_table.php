<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_reviews')) {
            Schema::create('company_reviews', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->integer('user_id')->nullable();
                $table->string('firstname',191);
                $table->string('lastname',191);
                $table->string('email',191);
                $table->string('review',191);
                $table->string('image',600)->nullable();
                $table->integer('postcode');
                $table->string('city',191);
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
        Schema::dropIfExists('company_reviews');
    }
}

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
        if (!Schema::hasTable('company_review')) {
            Schema::create('company_review', function (Blueprint $table) {
                $table->id();
                $table->string('company_id',11);
                $table->string('user_id',11);
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('review');
                $table->string('image');
                $table->string('postcode');
                $table->string('city');
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
        Schema::dropIfExists('company_review');
    }
}

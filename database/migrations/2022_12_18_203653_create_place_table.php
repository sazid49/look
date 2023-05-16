<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('places')) {
            Schema::create('places', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('country_id')->nullable();
                $table->string('place_name');
                $table->string('logo')->nullable();
                $table->string('firstname');
                $table->string('lastname');
                $table->string('address');
                $table->string('post_office_box')->nullable();
                $table->string('postcode', 4);
                $table->string('city');
                $table->string('canton', 40)->nullable();
                $table->string('longitude', 150);
                $table->string('latitude', 150);
                $table->string('phone_1', 20)->nullable();
                $table->string('phone_2', 20)->nullable();
                $table->string('phone_3', 20)->nullable();
                $table->string('mobile', 20)->nullable();
                $table->string('email')->nullable();
                $table->string('website')->nullable();
                $table->string('notes');
                $table->tinyText('keywords')->default(null);
                $table->boolean('show_frontpage')->default(0);
                $table->string('opening_hours');
                $table->string('slug');
                $table->string('hits', 11);
                $table->string('team_leader');
                $table->string('agent');
                $table->string('assigned_to');
                $table->tinyInteger('claimed')->default(0);
                $table->integer('claimed_by')->nullable();
                $table->dateTime('claimed_on')->nullable();
                $table->boolean('active');
                $table->boolean('published');
                $table->integer('inserted_by')->nullable();
                $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('places');
    }
}

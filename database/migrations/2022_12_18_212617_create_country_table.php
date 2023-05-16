<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('country_data')) {
            Schema::create('country_data', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100)->unique();
                $table->char('abv', 2)->comment('ISO 3661-1 alpha-2');
                $table->char('abv3', 3)->comment('ISO 3661-1 alpha-3')->nullable();
                $table->char('abv3_alt', 3)->nullable();
                $table->char('code', 3)->comment('ISO 3661-1 numeric')->nullable();
                $table->string('slug', 100);
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
        Schema::dropIfExists('country_data');
    }
}

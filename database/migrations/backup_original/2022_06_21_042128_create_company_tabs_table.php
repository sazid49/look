<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_tabs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->tinyInteger('show_register')->default(0);
            $table->tinyInteger('show_interraction')->default(0);
            $table->tinyInteger('show_contactform')->default(0);
            $table->tinyInteger('show_rating')->default(0);
            $table->tinyInteger('show_pricelist')->default(0);
            $table->tinyInteger('show_team')->default(0);
            $table->tinyInteger('show_news')->default(0);
            $table->tinyInteger('show_gallery')->default(0);
            $table->tinyInteger('show_jobs')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_tabs');
    }
}

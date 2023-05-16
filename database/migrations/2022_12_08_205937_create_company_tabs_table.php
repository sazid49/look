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
        if (!Schema::hasTable('company_tabs')) {
            Schema::create('company_tabs', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->boolean('show_interraction')->default('0');
                $table->boolean('show_jobs')->default('0');
                $table->boolean('show_gallery')->default('0');
                $table->boolean('show_review')->default('1');
                $table->boolean('show_contactform')->default('0');
                $table->boolean('show_pricelist')->default('0');
                $table->boolean('show_team')->default('0');
                $table->boolean('show_news')->default('0');
                $table->boolean('show_register')->default('1');
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
        Schema::dropIfExists('company_tabs');
    }
}

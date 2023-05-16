<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySocialmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_socialmedia')) {
            Schema::create('company_socialmedia', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->string('platform',40);
                $table->string('url');
                $table->string('icon',30);
                $table->boolean('active')->default('1');
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
        Schema::dropIfExists('company_socialmedia');
    }
}

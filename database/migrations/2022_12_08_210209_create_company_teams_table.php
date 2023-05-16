<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_teams')) {
            Schema::create('company_teams', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->string('profile_photo',600)->nullable();
                $table->string('name',191);
                $table->string('designation',60)->nullable();
                $table->string('email',191)->nullable();
                $table->string('phone',20)->nullable();
                $table->tinyText('twitter')->nullable();
                $table->tinyText('linkedin')->nullable();
                $table->tinyText('xing')->nullable();
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
        Schema::dropIfExists('company_teams');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyIdStagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('company_id_staging')){
            Schema::create('company_id_staging', function (Blueprint $table) {
                $table->id();
                $table->string('company_uid')->unique();
                $table->boolean('company_imported');
                $table->boolean('company_updating');
                $table->timestamps();
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
        Schema::dropIfExists('company_id_staging');
    }
}

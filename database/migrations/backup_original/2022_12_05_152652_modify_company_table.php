<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('uid')->nullable()->after('id');
            $table->longText('publications')->after('uid');
            $table->string('company_name_api')->after('company_name');
            $table->string('purpose')->nullable()->after('website');
            $table->tinyText('keyword')->nullable()->after('notes');
            $table->boolean('api_sync')->after('claimed_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropColumn(['uid','publications','canton_name','company_name_api','purpose','description_de','description_fr','description_it','description_en','tags','keyword','api_sync']);
        });
    }
}

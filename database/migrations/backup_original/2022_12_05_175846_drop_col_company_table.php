<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropColumn(['description_de','description_fr','description_it','description_en']);
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
            $table->longText('description_de')->nullable()->after('purpose');
            $table->longText('description_fr')->nullable()->after('description_de');
            $table->longText('description_it')->nullable()->after('description_fr');
            $table->longText('description_en')->nullable()->after('description_it');
        });
    }
}

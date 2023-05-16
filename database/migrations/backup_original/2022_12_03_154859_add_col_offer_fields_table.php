<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColOfferFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_fields', function (Blueprint $table) {
            $table->string('label_de')->after('label');
            $table->string('label_fr')->after('label_de');
            $table->string('label_it')->after('label_fr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offer_fields', function (Blueprint $table) {
            $table->dropColumn('label_de');
            $table->dropColumn('label_fr');
            $table->dropColumn('label_it');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColOfferFieldTbale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('offer_fields','is_deleted')){
            Schema::table('offer_fields', function (Blueprint $table) {
                $table->boolean('is_deleted')->after('is_required');
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
        Schema::table('offer_fields', function (Blueprint $table) {
            //
        });
    }
}

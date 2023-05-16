<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->string('payer',4)->after('raw_data')->nullable();
            $table->string('not_payer_reason',255)->after('payer')->nullable();
            $table->string('price_contract',50)->after('not_payer_reason')->nullable();
            $table->string('price_actual',50)->after('price_contract')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropColumn(['payer','not_payer_reason','price_contract','price_actual']);
        });
    }
}

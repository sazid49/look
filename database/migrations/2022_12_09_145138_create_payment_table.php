<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->string('transaction_id', 255);
                $table->integer('company_id');
                $table->string('payment_method', 255)->default(null);
                $table->string('detail', 255)->default(null);
                $table->string('raw_data', 255)->default(null);
                $table->tinyInteger('payer')->default(null);
                $table->string('not_payer_reason', 255)->default(null);
                $table->integer('price_contract')->default(null);
                $table->integer('price_actual')->default(null);
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
        Schema::dropIfExists('payments');
    }
}

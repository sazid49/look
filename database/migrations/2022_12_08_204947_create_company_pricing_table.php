<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_pricing')) {
            Schema::create('company_pricing', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->integer('parent_id')->nullable();
                $table->string('title',191);
                $table->text('description')->nullable();
                $table->decimal('price',10,2)->nullable();
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
        Schema::dropIfExists('company_pricing');
    }
}

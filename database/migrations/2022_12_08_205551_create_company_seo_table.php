<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_seo')) {
            Schema::create('company_seo', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->string('tab',40);
                $table->string('type',40);
                $table->string('content',300);
                $table->string('language',4);
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
        Schema::dropIfExists('company_seo');
    }
}

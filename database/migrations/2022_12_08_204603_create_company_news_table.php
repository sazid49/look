<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_news')) {
            Schema::create('company_news', function (Blueprint $table) {
                $table->id();
                $table->integer('company_id');
                $table->string('image',600)->nullable();
                $table->string('title');
                $table->string('author')->nullable();
                $table->text('description');
                $table->date('published_at')->nullable();
                $table->boolean('active')->default('0');
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
        Schema::dropIfExists('company_news');
    }
}

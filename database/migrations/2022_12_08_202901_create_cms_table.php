<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cms')) {
            Schema::create('cms', function (Blueprint $table) {
                $table->id();
                $table->integer('category_id')->nullable();
                $table->string('title',191);
                $table->text('content');
                $table->string('language',2);
                $table->string('meta_title',191)->nullable();
                $table->text('meta_description')->nullable();
                $table->boolean('show_on_footer')->default('0');
                $table->string('slug',191);
                $table->boolean('position')->default('1');
                $table->boolean('active')->default('1');
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('cms');
    }
}

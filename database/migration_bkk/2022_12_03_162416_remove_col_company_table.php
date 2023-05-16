<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropColumn('show_interraction');
            $table->dropColumn('show_jobs');
            $table->dropColumn('show_rating');
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
            $table->boolean('show_interraction')->after('assigned_to');
            $table->boolean('show_jobs')->after('show_interraction');
            $table->boolean('show_rating')->after('show_jobs');
        });
    }
}

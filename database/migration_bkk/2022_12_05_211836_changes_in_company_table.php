<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesInCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropColumn(['rubric','info_1']);
            $table->boolean('active')->change();
            $table->boolean('show_frontpage')->after('assigned_to');
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
            $table->string('rubric')->nullable()->after('canton_name');
            $table->string('info_1')->nullable()->after('active');
            $table->dropColumn('show_frontpage');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserAddField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::rename('users', 'as_users');
		Schema::table('as_users', function (Blueprint $table) {
			$table->tinyInteger('user_role')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('as_users', function (Blueprint $table) {
            $table->dropColumn('user_role');
        });
    }
}

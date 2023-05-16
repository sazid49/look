<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconCategoryCompanyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('category_company_data',['icon','featured'])) {
            Schema::table('category_company_data', function (Blueprint $table) {
                $table->string('icon')->after('language');
                $table->boolean('featured')->after('icon')->default(0);
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
        Schema::table('category_company_data', function (Blueprint $table) {
            $table->dropColumn(['icon','featured']);
        });
    }
}

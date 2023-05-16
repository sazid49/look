<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameListingIdToCompanyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommendation', function (Blueprint $table) {
            if (Schema::hasColumn('recommendation','listing_id')) {
                $table->renameColumn('listing_id','company_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recommendation', function (Blueprint $table) {
            if (Schema::hasColumn('recommendation','company_id')) {
                $table->renameColumn('company_id','listing_id');
            }
        });
    }
}

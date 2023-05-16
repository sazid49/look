<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('uid',20)->nullable();
                $table->longText('publications')->nullable();
                $table->integer('category_id')->nullable();
                $table->string('rubric')->nullable();
                $table->string('company_name',191);
                $table->string('company_name_api',191);
                $table->string('logo',191)->nullable();
                $table->string('firstname',191)->nullable();
                $table->string('lastname',191)->nullable();
                $table->string('address',191)->nullable();
                $table->string('post_office_box',30)->nullable();
                $table->string('postcode',4)->nullable();
                $table->string('city',191)->nullable();
                $table->string('longitude',191)->nullable();
                $table->string('latitude',191)->nullable();
                $table->string('canton',40)->nullable();
                $table->string('phone_1',20)->nullable();
                $table->string('phone_2',20)->nullable();
                $table->string('phone_3',20)->nullable();
                $table->string('mobile',20)->nullable();
                $table->string('email',191)->nullable();
                $table->string('website',191)->nullable();
                $table->string('purpose',191)->nullable();
                $table->text('notes')->nullable();
                $table->tinyText('keywords')->nullable();
                $table->integer('foundingyear')->nullable();
                $table->boolean('show_tabs')->default('0');
                $table->boolean('show_frontpage')->default('0');
                $table->longText('opening_hours')->nullable();
                $table->string('slug',191)->nullable();
                $table->integer('hits')->default('1');
                $table->integer('team_leader')->nullable();
                $table->integer('agent')->nullable();
                $table->integer('assigned_to')->nullable();
                $table->boolean('claimed')->default('0');
                $table->integer('claimed_by')->nullable();
                $table->datetime('claimed_on')->nullable();
                $table->boolean('active')->nullable();
                $table->boolean('published')->default('1');
                $table->boolean('api_sync')->nullable();
                $table->integer('created_by')->default('0');
                $table->integer('updated_by')->default('0');
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
        Schema::dropIfExists('companies');
    }
}

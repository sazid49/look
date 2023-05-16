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
        Schema::create('company_seo', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            
            $table->string('information_metatitle_de',255)->nullable();
            $table->text('information_metadescription_de')->nullable();
            $table->string('information_metatitle_ft',255)->nullable();
            $table->text('information_metadescription_ft')->nullable();
            $table->string('information_metatitle_en',255)->nullable();
            $table->text('information_metadescription_en')->nullable();
            $table->string('information_metatitle_it',255)->nullable();
            $table->text('information_metadescription_it')->nullable();
            
            $table->string('interraction_metatitle_de',255)->nullable();
            $table->text('interraction_metadescription_de')->nullable();
            $table->string('interraction_metatitle_ft',255)->nullable();
            $table->text('interraction_metadescription_ft')->nullable();
            $table->string('interraction_metatitle_en',255)->nullable();
            $table->text('interraction_metadescription_en')->nullable();
            $table->string('interraction_metatitle_it',255)->nullable();
            $table->text('interraction_metadescription_it')->nullable();

            $table->string('job_metatitle_de',255)->nullable();
            $table->text('job_metadescription_de')->nullable();
            $table->string('job_metatitle_ft',255)->nullable();
            $table->text('job_metadescription_ft')->nullable();
            $table->string('job_metatitle_en',255)->nullable();
            $table->text('job_metadescription_en')->nullable();
            $table->string('job_metatitle_it',255)->nullable();
            $table->text('job_metadescription_it')->nullable();

            $table->string('kontaktformular_metatitle_de',255)->nullable();
            $table->text('kontaktformular_metadescription_de')->nullable();
            $table->string('kontaktformular_metatitle_ft',255)->nullable();
            $table->text('kontaktformular_metadescription_ft')->nullable();
            $table->string('kontaktformular_metatitle_en',255)->nullable();
            $table->text('kontaktformular_metadescription_en')->nullable();
            $table->string('kontaktformular_metatitle_it',255)->nullable();
            $table->text('kontaktformular_metadescription_it')->nullable();

            $table->string('empfehlungen_metatitle_de',255)->nullable();
            $table->text('empfehlungen_metadescription_de')->nullable();
            $table->string('empfehlungen_metatitle_ft',255)->nullable();
            $table->text('empfehlungen_metadescription_ft')->nullable();
            $table->string('empfehlungen_metatitle_en',255)->nullable();
            $table->text('empfehlungen_metadescription_en')->nullable();
            $table->string('empfehlungen_metatitle_it',255)->nullable();
            $table->text('empfehlungen_metadescription_it')->nullable();

            $table->string('preisliste_metatitle_de',255)->nullable();
            $table->text('preisliste_metadescription_de')->nullable();
            $table->string('preisliste_metatitle_ft',255)->nullable();
            $table->text('preisliste_metadescription_ft')->nullable();
            $table->string('preisliste_metatitle_en',255)->nullable();
            $table->text('preisliste_metadescription_en')->nullable();
            $table->string('preisliste_metatitle_it',255)->nullable();
            $table->text('preisliste_metadescription_it')->nullable();

            $table->string('team_metatitle_de',255)->nullable();
            $table->text('team_metadescription_de')->nullable();
            $table->string('team_metatitle_ft',255)->nullable();
            $table->text('team_metadescription_ft')->nullable();
            $table->string('team_metatitle_en',255)->nullable();
            $table->text('team_metadescription_en')->nullable();
            $table->string('team_metatitle_it',255)->nullable();
            $table->text('team_metadescription_it')->nullable();

            $table->string('news_metatitle_de',255)->nullable();
            $table->text('news_metadescription_de')->nullable();
            $table->string('news_metatitle_ft',255)->nullable();
            $table->text('news_metadescription_ft')->nullable();
            $table->string('news_metatitle_en',255)->nullable();
            $table->text('news_metadescription_en')->nullable();
            $table->string('news_metatitle_it',255)->nullable();
            $table->text('news_metadescription_it')->nullable();

            $table->string('galerie_metatitle_de',255)->nullable();
            $table->text('galerie_metadescription_de')->nullable();
            $table->string('galerie_metatitle_ft',255)->nullable();
            $table->text('galerie_metadescription_ft')->nullable();
            $table->string('galerie_metatitle_en',255)->nullable();
            $table->text('galerie_metadescription_en')->nullable();
            $table->string('galerie_metatitle_it',255)->nullable();
            $table->text('galerie_metadescription_it')->nullable();

            $table->string('rating_metatitle_de',255)->nullable();
            $table->text('rating_metadescription_de')->nullable();
            $table->string('rating_metatitle_ft',255)->nullable();
            $table->text('rating_metadescription_ft')->nullable();
            $table->string('rating_metatitle_en',255)->nullable();
            $table->text('rating_metadescription_en')->nullable();
            $table->string('rating_metatitle_it',255)->nullable();
            $table->text('rating_metadescription_it')->nullable();
           
            $table->timestamps();
        });
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

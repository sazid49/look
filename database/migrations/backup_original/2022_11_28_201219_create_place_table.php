<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('place')) {
            Schema::create('place', function (Blueprint $table) {
                $table->id();
                $table->string( 'id_category');
                $table->string( 'place_name');
                $table->string( 'firstname');
                $table->string( 'lastname');
                $table->string( 'address');
                $table->string( 'post_office_box');
                $table->string( 'postcode',4);
                $table->string( 'city');
                $table->string( 'canton');
                $table->string( 'country');
                $table->string( 'latitude',150);
                $table->string( 'longitude',150);
                $table->string( 'phone_1');
                $table->string( 'phone_2',50);
                $table->string( 'phone_3',50);
                $table->string( 'mobile',50);
                $table->string( 'email');
                $table->string( 'website');
                $table->string( 'description_de');
                $table->string( 'description_fr');
                $table->string( 'description_it');
                $table->string( 'description_en');
                $table->string( 'tags');
                $table->string( 'facebook');
                $table->string( 'twitter');
                $table->string( 'instagram');
                $table->string( 'meta_title_de');
                $table->string( 'meta_description_de',500);
                $table->string( 'meta_title_fr');
                $table->string( 'meta_description_fr');
                $table->string( 'meta_title_en');
                $table->string( 'meta_description_en');
                $table->string( 'meta_title_it');
                $table->string( 'meta_description_it');
                $table->string( 'image1');
                $table->string( 'image2');
                $table->string( 'image3');
                $table->string( 'image4');
                $table->string( 'image5');
                $table->string( 'payer',1);
                $table->string( 'not_payer_reason');
                $table->string( 'price_contract',50);
                $table->string( 'price_actual');
                $table->string( 'notes');
                $table->string( 'team_leader');
                $table->string( 'agent');
                $table->string( 'assigned_to');
                $table->string( 'active',1);
                $table->string( 'info_1');
                $table->string( 'insert_date');
                $table->string( 'update_date');
                $table->string( 'listing_id');
                $table->string( 'image_logo');
                $table->string( 'updated_by');
                $table->string( 'inserted_by');
                $table->string( 'show_interraction',1);
                $table->string( 'user_id');
                $table->string( 'opening_hours',);
                $table->string( 'slug');
                $table->string( 'show_kontaktenformular',1);
                $table->string( 'show_jobs',1);
                $table->string( 'hits',11);
                $table->string( 'published',1);
                $table->timestamps();
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
        Schema::dropIfExists('place');
    }
}

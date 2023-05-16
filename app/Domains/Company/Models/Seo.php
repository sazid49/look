<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes;

    protected $table = "company_seo";
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
//        'id',
//        'company_id',
//
//        'information_metatitle_de',
//        'information_metadescription_de',
//        'information_metatitle_ft',
//        'information_metadescription_ft',
//        'information_metatitle_en',
//        'information_metadescription_en',
//        'information_metatitle_it',
//        'information_metadescription_it',
//
//        'interraction_metatitle_de',
//        'interraction_metadescription_de',
//        'interraction_metatitle_ft',
//        'interraction_metadescription_ft',
//        'interraction_metatitle_en',
//        'interraction_metadescription_en',
//        'interraction_metatitle_it',
//        'interraction_metadescription_it',
//
//        'job_metatitle_de',
//        'job_metadescription_de',
//        'job_metatitle_ft',
//        'job_metadescription_ft',
//        'job_metatitle_en',
//        'job_metadescription_en',
//        'job_metatitle_it',
//        'job_metadescription_it',
//
//        'kontaktformular_metatitle_de',
//        'kontaktformular_metadescription_de',
//        'kontaktformular_metatitle_ft',
//        'kontaktformular_metadescription_ft',
//        'kontaktformular_metatitle_en',
//        'kontaktformular_metadescription_en',
//        'kontaktformular_metatitle_it',
//        'kontaktformular_metadescription_it',
//
//        'empfehlungen_metatitle_de',
//        'empfehlungen_metadescription_de',
//        'empfehlungen_metatitle_ft',
//        'empfehlungen_metadescription_ft',
//        'empfehlungen_metatitle_en',
//        'empfehlungen_metadescription_en',
//        'empfehlungen_metatitle_it',
//        'empfehlungen_metadescription_it',
//
//        'preisliste_metatitle_de',
//        'preisliste_metadescription_de',
//        'preisliste_metatitle_ft',
//        'preisliste_metadescription_ft',
//        'preisliste_metatitle_en',
//        'preisliste_metadescription_en',
//        'preisliste_metatitle_it',
//        'preisliste_metadescription_it',
//
//        'team_metatitle_de',
//        'team_metadescription_de',
//        'team_metatitle_ft',
//        'team_metadescription_ft',
//        'team_metatitle_en',
//        'team_metadescription_en',
//        'team_metatitle_it',
//        'team_metadescription_it',
//
//        'news_metatitle_de',
//        'news_metadescription_de',
//        'news_metatitle_ft',
//        'news_metadescription_ft',
//        'news_metatitle_en',
//        'news_metadescription_en',
//        'news_metatitle_it',
//        'news_metadescription_it',
//
//        'galerie_metatitle_de',
//        'galerie_metadescription_de',
//        'galerie_metatitle_ft',
//        'galerie_metadescription_ft',
//        'galerie_metatitle_en',
//        'galerie_metadescription_en',
//        'galerie_metatitle_it',
//        'galerie_metadescription_it',
//
//        'rating_metatitle_de',
//        'rating_metadescription_de',
//        'rating_metatitle_ft',
//        'rating_metadescription_ft',
//        'rating_metatitle_en',
//        'rating_metadescription_en',
//        'rating_metatitle_it',
//        'rating_metadescription_it',

        'company_id',
        'tab',
        'type',
        'content',
        'language',

    ];

}

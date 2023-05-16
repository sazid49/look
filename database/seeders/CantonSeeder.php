<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'code' => 'ZH',
                'value' => 'Zurich',
                'language' => 'en'
            ],
            [
                'code' => 'BE',
                'value' => 'Bern',
                'language' => 'en'
            ],
            [
                'code' => 'LU',
                'value' => 'Lucerne',
                'language' => 'en'
            ],
            [
                'code' => 'UR',
                'value' => 'Uri',
                'language' => 'en'
            ],
            [
                'code' => 'SZ',
                'value' => 'Schwyz',
                'language' => 'en'
            ],
            [
                'code' => 'OW',
                'value' => 'Obwald',
                'language' => 'en'
            ],
            [
                'code' => 'NW',
                'value' => 'Nidwald',
                'language' => 'en'
            ],
            [
                'code' => 'GL',
                'value' => 'Glarus',
                'language' => 'en'
            ],
            [
                'code' => 'ZG',
                'value' => 'Zoug',
                'language' => 'en'
            ],
            [
                'code' => 'FR',
                'value' => 'Friburg',
                'language' => 'en'
            ],
            [
                'code' => 'SO',
                'value' => 'Soleure',
                'language' => 'en'
            ],
            [
                'code' => 'BS',
                'value' => 'Basle City',
                'language' => 'en'
            ],
            [
                'code' => 'BL',
                'value' => 'Basle Country',
                'language' => 'en'
            ],
            [
                'code' => 'SH',
                'value' => 'Schaffhouse',
                'language' => 'en'
            ],
            [
                'code' => 'AR',
                'value' => 'Appenzell Ourter Rhodes',
                'language' => 'en'
            ],
            [
                'code' => 'AI',
                'value' => 'Appenzell Inner Rhodes',
                'language' => 'en'
            ],
            [
                'code' => 'SG',
                'value' => 'St. Gallen',
                'language' => 'en'
            ],
            [
                'code' => 'GR',
                'value' => 'Grisons',
                'language' => 'en'
            ],
            [
                'code' => 'AG',
                'value' => 'Argovia',
                'language' => 'en'
            ],
            [
                'code' => 'TG',
                'value' => 'Thurgovia',
                'language' => 'en'
            ],
            [
                'code' => 'TI',
                'value' => 'Ticino',
                'language' => 'en'
            ],
            [
                'code' => 'VD',
                'value' => 'Vaud',
                'language' => 'en'
            ],
            [
                'code' => 'VS',
                'value' => 'Wallis',
                'language' => 'en'
            ],
            [
                'code' => 'NE',
                'value' => 'Neuchatel',
                'language' => 'en'
            ],
            [
                'code' => 'GE',
                'value' => 'Geneva',
                'language' => 'en'
            ],
            [
                'code' => 'JU',
                'value' => 'Jura',
                'language' => 'en'
            ],
            [
                'code' => 'CH',
                'value' => 'Swiss Confederation',
                'language' => 'en'
            ],
            [
                'code' => 'ZH',
                'value' => 'Zürich',
                'language' => 'de'
            ],
            [
                'code' => 'BE',
                'value' => 'Bern',
                'language' => 'de'
            ],
            [
                'code' => 'LU',
                'value' => 'Luzern',
                'language' => 'de'
            ],
            [
                'code' => 'UR',
                'value' => 'Uri',
                'language' => 'de'
            ],
            [
                'code' => 'SZ',
                'value' => 'Schwyz',
                'language' => 'de'
            ],
            [
                'code' => 'OW',
                'value' => 'Obwalden',
                'language' => 'de'
            ],
            [
                'code' => 'NW',
                'value' => 'Nidwalden',
                'language' => 'de'
            ],
            [
                'code' => 'GL',
                'value' => 'Glarus',
                'language' => 'de'
            ],
            [
                'code' => 'ZG',
                'value' => 'Zug',
                'language' => 'de'
            ],
            [
                'code' => 'FR',
                'value' => 'Freiburg',
                'language' => 'de'
            ],
            [
                'code' => 'SO',
                'value' => 'Solothurn',
                'language' => 'de'
            ],
            [
                'code' => 'BS',
                'value' => 'Basel-Stadt',
                'language' => 'de'
            ],
            [
                'code' => 'BL',
                'value' => 'Basel-Landschaft',
                'language' => 'de'
            ],
            [
                'code' => 'SH',
                'value' => 'Schaffhausen',
                'language' => 'de'
            ],
            [
                'code' => 'AR',
                'value' => 'Appenzell Ausserrhoden',
                'language' => 'de'
            ],
            [
                'code' => 'AI',
                'value' => 'Appenzell Innerrhoden',
                'language' => 'de'
            ],
            [
                'code' => 'SG',
                'value' => 'St. Gallen',
                'language' => 'de'
            ],
            [
                'code' => 'GR',
                'value' => 'Graubünden',
                'language' => 'de'
            ],
            [
                'code' => 'AG',
                'value' => 'Aargau',
                'language' => 'de'
            ],
            [
                'code' => 'TG',
                'value' => 'Thurgau',
                'language' => 'de'
            ],
            [
                'code' => 'TI',
                'value' => 'Tessin',
                'language' => 'de'
            ],
            [
                'code' => 'VD',
                'value' => 'Waadt',
                'language' => 'de'
            ],
            [
                'code' => 'VS',
                'value' => 'Wallis',
                'language' => 'de'
            ],
            [
                'code' => 'NE',
                'value' => 'Neuenburg',
                'language' => 'de'
            ],
            [
                'code' => 'GE',
                'value' => 'Genf',
                'language' => 'de'
            ],
            [
                'code' => 'JU',
                'value' => 'Jura',
                'language' => 'de'
            ],
            [
                'code' => 'CH',
                'value' => 'Swiss Confederation',
                'language' => 'de'
            ],


            [
                'code' => 'ZH',
                'value' => 'Zurich',
                'language' => 'fr'
            ],
            [
                'code' => 'BE',
                'value' => 'Berne',
                'language' => 'fr'
            ],
            [
                'code' => 'LU',
                'value' => 'Lucerne',
                'language' => 'fr'
            ],
            [
                'code' => 'UR',
                'value' => 'Uri',
                'language' => 'fr'
            ],
            [
                'code' => 'SZ',
                'value' => 'Schwyz',
                'language' => 'fr'
            ],
            [
                'code' => 'OW',
                'value' => 'Obwald',
                'language' => 'fr'
            ],
            [
                'code' => 'NW',
                'value' => 'Nidwald',
                'language' => 'fr'
            ],
            [
                'code' => 'GL',
                'value' => 'Glaris',
                'language' => 'fr'
            ],
            [
                'code' => 'ZG',
                'value' => 'Zoug',
                'language' => 'fr'
            ],
            [
                'code' => 'FR',
                'value' => 'Fribourg',
                'language' => 'fr'
            ],
            [
                'code' => 'SO',
                'value' => 'Soleure',
                'language' => 'fr'
            ],
            [
                'code' => 'BS',
                'value' => 'Bâle-Ville',
                'language' => 'fr'
            ],
            [
                'code' => 'BL',
                'value' => 'Bâle-Campagne',
                'language' => 'fr'
            ],
            [
                'code' => 'SH',
                'value' => 'Schaffhouse',
                'language' => 'fr'
            ],
            [
                'code' => 'AR',
                'value' => 'Appenzell Rhodes-Extérieures',
                'language' => 'fr'
            ],
            [
                'code' => 'AI',
                'value' => 'Appenzell Rhodes-Intérieures',
                'language' => 'fr'
            ],
            [
                'code' => 'SG',
                'value' => 'Saint-Gall',
                'language' => 'fr'
            ],
            [
                'code' => 'GR',
                'value' => 'Grisons',
                'language' => 'fr'
            ],
            [
                'code' => 'AG',
                'value' => 'Argovie',
                'language' => 'fr'
            ],
            [
                'code' => 'TG',
                'value' => 'Thurgovie',
                'language' => 'fr'
            ],
            [
                'code' => 'TI',
                'value' => 'Tessin',
                'language' => 'fr'
            ],
            [
                'code' => 'VD',
                'value' => 'Vaud',
                'language' => 'fr'
            ],
            [
                'code' => 'VS',
                'value' => 'Valais',
                'language' => 'fr'
            ],
            [
                'code' => 'NE',
                'value' => 'Neuchâtel',
                'language' => 'fr'
            ],
            [
                'code' => 'GE',
                'value' => 'Genève',
                'language' => 'fr'
            ],
            [
                'code' => 'JU',
                'value' => 'Jura',
                'language' => 'fr'
            ],
            [
                'code' => 'CH',
                'value' => 'Swiss Confederation',
                'language' => 'fr'
            ],
            [
                'code' => 'ZH',
                'value' => 'Zurigo',
                'language' => 'it'
            ],
            [
                'code' => 'BE',
                'value' => 'Berna',
                'language' => 'it'
            ],
            [
                'code' => 'LU',
                'value' => 'Lucerna',
                'language' => 'it'
            ],
            [
                'code' => 'UR',
                'value' => 'Uri',
                'language' => 'it'
            ],
            [
                'code' => 'SZ',
                'value' => 'Svitto',
                'language' => 'it'
            ],
            [
                'code' => 'OW',
                'value' => 'Obvaldo',
                'language' => 'it'
            ],
            [
                'code' => 'NW',
                'value' => 'Nidvaldo',
                'language' => 'it'
            ],
            [
                'code' => 'GL',
                'value' => 'Glarona',
                'language' => 'it'
            ],
            [
                'code' => 'ZG',
                'value' => 'Zugo',
                'language' => 'it'
            ],
            [
                'code' => 'FR',
                'value' => 'Friburgo',
                'language' => 'it'
            ],
            [
                'code' => 'SO',
                'value' => 'Soletta',
                'language' => 'it'
            ],
            [
                'code' => 'BS',
                'value' => 'Basilea Città',
                'language' => 'it'
            ],
            [
                'code' => 'BL',
                'value' => 'Basilea Campagna',
                'language' => 'it'
            ],
            [
                'code' => 'SH',
                'value' => 'Sciaffusa',
                'language' => 'it'
            ],
            [
                'code' => 'AR',
                'value' => 'Appenzello Esterno',
                'language' => 'it'
            ],
            [
                'code' => 'AI',
                'value' => 'Appenzello Interno',
                'language' => 'it'
            ],
            [
                'code' => 'SG',
                'value' => 'San Gallo',
                'language' => 'it'
            ],
            [
                'code' => 'GR',
                'value' => 'Grigioni',
                'language' => 'it'
            ],
            [
                'code' => 'AG',
                'value' => 'Argovia',
                'language' => 'it'
            ],
            [
                'code' => 'TG',
                'value' => 'Turgovia',
                'language' => 'it'
            ],
            [
                'code' => 'TI',
                'value' => 'Ticino',
                'language' => 'it'
            ],
            [
                'code' => 'VD',
                'value' => 'Vaud',
                'language' => 'it'
            ],
            [
                'code' => 'VS',
                'value' => 'Vallese',
                'language' => 'it'
            ],
            [
                'code' => 'NE',
                'value' => 'Neuchâtel',
                'language' => 'it'
            ],
            [
                'code' => 'GE',
                'value' => 'Ginevra',
                'language' => 'it'
            ],
            [
                'code' => 'JU',
                'value' => 'Giura',
                'language' => 'it'
            ],
            [
                'code' => 'CH',
                'value' => 'Swiss Confederation',
                'language' => 'it'
            ],
        ];

        foreach ($data as $d){
            DB::table('canton_data')->insert($d);
        }
    }
}

<?php
    /**
     * Created by PhpStorm.
     * User: Radd, Norrin
     * Date: 6/22/2022
     * Time: 2:20 PM
     */


    namespace lookon\lib\import;

    use slugger;
    use function in_array;
    use function json_encode;

    require_once "Slugger.php";

    /**
     *  Class PublicationModel
     *
     *  Holds state of a publication and transformation methods
     *  for preparing an API publication for storage in the db.
     */
    class CompanyModel
    {
        //public $id;
        public $uid;
        public $publications;
        public $category_id;
        public $rubric;
        public $company_name;
        public $company_name_api;
        public $logo;
        public $firstname;
        public $lastname;
        public $address;
        public $post_office_box;
        public $postcode;
        public $city;
        public $longitude;
        public $latitude;
        public $canton;
        public $phone_1;
        public $phone_2;
        public $phone_3;
        public $mobile;
        public $email;
        public $website;
        public $purpose;
        public $notes;
        public $keywords;
        public $foundingyear;
        public $show_tabs;
        public $show_frontpage;
        public $opening_hours;
        public $slug;
        public $hits;
        public $team_leader;
        public $agent;
        public $assigned_to;
        public $claimed;
        public $claimed_by;
        public $claimed_on;
        public $active;
        public $published;
        public $api_sync;
        public $inserted_by;
        public $updated_by;
        // public $created_at;
        // public $updated_at;
        // public $deleted_at;


        public function __construct($data)
        {
            if( !$data->desynced ){
                $this->company_name         = $data->name??"";
                $this->slug                 = Slugger::slugify( $this->company_name );
            }
            else{
                unset($this->company_name);
                unset($this->slug);
            }


            if( !empty( $data ) ){
                $this->uid                  = (string)$data->uid;
                $this->publications         = json_encode ($data->sogcPub) ;
                $this->company_name_api     = $data->name??"";
                $this->category_id          = null;
                $this->rubric               = null;
                $this->logo                 = null;
                $this->firstname            = null;
                $this->lastname             = null;
                $this->address              = $data->address->street." ".$data->address->houseNumber;
                $this->post_office_box      = $data->address->poBox;
                $this->postcode             = $data->address->swissZipCode;
                $this->city                 = $data->address->city;
                $this->longitude            = null;
                $this->latitude             = null;
                $this->canton               = $data->canton;
                $this->phone_1              = null;
                $this->phone_2              = null;
                $this->phone_3              = null;
                $this->mobile               = null;
                $this->email                = null;
                $this->website              = null;
                $this->purpose              = null;
                $this->notes                = null;
                $this->keywords             = null;
                $this->foundingyear         = null;
                $this->show_tabs            = 0;
                $this->show_frontpage       = 0;
                $this->opening_hours        = "[]";
                $this->hits                 = null;
                $this->team_leader          = 0;
                $this->agent                = 0;
                $this->assigned_to          = 0;
                $this->claimed              = 0;
                $this->claimed_by           = 0;
                $this->claimed_on           = null;
                $this->active               = $data->status == 'ACTIVE' ? 1 : 0;
                $this->published            = 1;
                $this->api_sync             = $data->api_sync ?? 1;
                $this->inserted_by          = 0;
                $this->updated_by           = 0;
                // $this->created_at           = null;     // let the db fill this automatically
                // $this->updated_at           = null;
                // $this->deleted_at           = null;


                // Should be inserted in payment table
                // $this->not_payer_reason     = "api_sync";
            }
            else{
                echo '<br/>skipping invalid entry<br/>';
            }
        }
    }

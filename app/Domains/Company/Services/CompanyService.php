<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\Models\Application;
use App\Domains\Company\Models\Payment;
use App\Slim\Slim;
use Exception;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;  
use App\Exceptions\GeneralException;
use App\Domains\Company\Models\Company;
use App\Domains\Company\Models\CompanyTabs;
use App\Domains\Company\Models\CompanyTags;
use App\Domains\Company\Models\CompanyText;
use App\Domains\Company\Models\Contact;
use App\Domains\Company\Models\Gallery;
use App\Domains\Company\Models\JobApplication;
use App\Domains\Company\Models\News;
use App\Domains\Company\Models\Offers;
use App\Domains\Company\Models\OffersFieldAnswer;
use App\Domains\Company\Models\Pricing;
use App\Domains\Company\Models\Recommendation;
use App\Domains\Company\Models\ReviewReply;
use App\Domains\Company\Models\Reviews;
use App\Domains\Company\Models\Seo;
use App\Domains\Company\Models\Socialmedia;
use App\Domains\Company\Models\Team;
use App\Mail\CompanyApplyJobMail;
use App\Mail\CompanyContactUsMail;
use App\Mail\CompanyOfferMail;
use App\Mail\CompanyReviewMail;
use App\Models\ReviewRating;
use Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Mail;
use Storage;

/**
 * Class CompanyService.
 */
class CompanyService extends BaseService
{
    /**
     * CompanyService constructor.
     *
     * @param  Company  $Company
     * @param  News  $news
     * @param  JobApplication  $job
     */
    public function __construct(Company $Company,Payment $payment,News $news, JobApplication $job, Gallery $gallery, Seo $seo, Team $team, Contact $contact, Offers $offers, OffersFieldAnswer $offersFieldAnswer, Reviews $reviews,ReviewRating $reviewrating,Application $application,ReviewReply $ReviewReply)
    {
        $this->model = $Company;
        $this->news = $news;
        $this->team = $team;
        $this->job = $job;
        $this->gallery = $gallery;
        $this->seo = $seo;
        $this->contact = $contact;
        $this->offers = $offers;
        $this->offersFieldAnswer = $offersFieldAnswer;
        $this->reviews = $reviews;
        $this->reviewrating = $reviewrating;
        $this->ReviewReply = $ReviewReply;
        $this->application = $application;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Company
    {
        DB::beginTransaction();
        try {

            $company_logo = "/";
            $thumbnail = "/";
//            $data['company_logo'] = json_decode($data['company_logo'], true);
//            if (isset($data['company_logo']['output']['image']) && !empty($data['company_logo']['output']['image'])) {
//                $company_logo = '/company_logo/' . $data['company_logo']['output']['name'];
//                $val = $data['company_logo']['output']['image'];
//                $type = $data['company_logo']['output']['type'];
//
//                if (!empty($val)) {
//                    $logo      = Image::make($val)->encode($type);
//                    Storage::disk('public')->put($company_logo, $logo);
//                }
//            }


            $images = Slim::getImages();
            foreach ($images as $image){
                if($image['meta']->name == 'logo'){
                    $nameSlug = \Str::slug($data['company_name']);

                    $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                    $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;

                    $logo_data = $image['output']['data'];

                    $companyId = Company::query()->max('id');
                    $nextCompanyId = (int)$companyId + 1;

                    Slim::saveFile($logo_data, $name, '../storage/app/public/company_logo/'.$nextCompanyId.'/',false);

                    $company_logo = 'company_logo/'.$nextCompanyId.'/'.$name;
                }
                if($image['meta']->name == 'thumbnail'){
                    $nameSlug = \Str::slug($data['company_name']);

                    $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                    $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;

                    $thumbnail_data = $image['output']['data'];

                    $companyId = Company::query()->max('id');
                    $nextCompanyId = (int)$companyId + 1;

                    Slim::saveFile($thumbnail_data, $name, '../storage/app/public/company_thumbnail/'.$nextCompanyId.'/',false);

                    $thumbnail = 'company_thumbnail/'.$nextCompanyId.'/'.$name;
                }
            }



            //todo:: add payment store
            $company = $this->model::query()->create([
                'uid' => $data['uid'] ?? null,
                'publications' => $data['publications'] ?? null,
                'category_id' => $data['category_id'],
                'company_name' => $data['company_name'],
                'company_name_api' => null,
                'logo' => $company_logo,
                'thumbnail' => $thumbnail,
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'address' => $data['address'],
                'post_office_box' => null,
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
                'canton' => $data['canton'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'phone_3' => $data['phone_3'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'website' => $data['website'],
                'youtube_video' => $data['youtube_video'],
                'purpose' => null,
                'notes' => $data['notes'],
                'keywords' => $data['keywords'],
                'foundingyear' => $data['founding_year'],
                'team_leader' => $data['team_leader'],
                'agent' => $data['agent'],
                'assigned_to' => $data['assigned_to'],
                'show_tabs' => $data['show_tabs'] ?? 0,
                'show_frontpage' => $data['show_frontpage'] ?? 0,
                'opening_hours' => $data['opening_hours'] ?? null,
                'slug' => \Str::slug($data['company_name']),
                'hits' => 1,
                'active' => $data['active'] ?? 0,
                'claimed' => 0,
                'claimed_by' => Null,
                'published' => $data['published'] ?? 0,
                'claimed_on' => null,
                'api_sync' => null,
                'created_by' => Auth()->id(),
                'updated_by' => Auth()->id(),

                //'payer' => $data['payer'] ?? null,
                //'not_payer_reason' => $data['not_payer_reason'],
                //'price_contract' => $data['price_contract'],
                //'price_actual' => $data['price_actual'],
                //'description_de' => $data['description_de'],
                //'description_fr' => $data['description_fr'],
                //'description_en' => $data['description_en'],
                //'description_it' => $data['description_it'],
            ]);

            $socials = ['facebook','youtube','twitter','instagram','tiktok'];
            foreach ($socials as $social){
                if($data[$social]){
                    $socialMediaData = [
                        'company_id' => $company->id,
                        'platform' => $social,
                        'url' => $data[$social],
                        'icon' => 'fab fa-'.$social,
                        'active' => 1,
                    ];

                    Socialmedia::query()->create($socialMediaData);
                }
            }

            if(!empty($data['tags'])) {
                foreach ($data['tags'] as $key => $tag) {
                    CompanyTags::query()->create([
                        'company_id' => $company->id,
                        'tag_id' => $tag,
                    ]);
                }
            }

            $langs = ['de','fr','en','it'];
            foreach ($langs as $lang){
                $company_text = [
                    'company_id' => $company->id,
                    'content' => $data['description_'.$lang],
                    'language' => $lang
                ];
                CompanyText::query()->create($company_text);
            }

        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $company;
    }

//    /**
//     * @param  Company  $company
//     * @param  array  $data
//     *
//     * @return Company
//     * @throws GeneralException
//     * @throws \Throwable
//     */
//    public function update(Company $company, array $data = []): Company
//    {
//
//        DB::beginTransaction();
//        try {
//            $company_logo = $company->company_logo;
//            $data['company_logo'] = json_decode($data['company_logo'], true);
//            if (isset($data['company_logo']['output']['image']) && !empty($data['company_logo']['output']['image'])) {
//                $company_logo = '/company_logo/' . $data['company_logo']['output']['name'];
//                $val = $data['company_logo']['output']['image'];
//                $type = $data['company_logo']['output']['type'];
//
//                if (!empty($val)) {
//                    $logo      = Image::make($val)->encode($type);
//                    Storage::disk('public')->put($company_logo, $logo);
//                }
//            }
//            $company->update([
//                'uid' => null,
//                'publications' => null,
//                'category_id' => $data['category_id'],
//                'company_name' => $data['company_name'],
//                'company_name_api' => null,
//                'logo' => $company_logo,
//                'firstname' => $data['firstname'],
//                'lastname' => $data['lastname'],
//                'address' => $data['address'],
//                'post_office_box' => null,
//                'postcode' => $data['postcode'],
//                'city' => $data['city'],
//                'longitude' => $data['longitude'],
//                'latitude' => $data['latitude'],
//                'canton' => $data['canton'],
//                'phone_1' => $data['phone_1'],
//                'phone_2' => $data['phone_2'],
//                'phone_3' => $data['phone_3'],
//                'mobile' => $data['mobile'],
//                'email' => $data['email'],
//                'website' => $data['website'],
//                'youtube_video' => $data['youtube_video'],
//                'purpose' => null,
//                'notes' => $data['notes'],
//                'keywords' => $data['keywords'],
//                'foundingyear' => $data['founding_year'],
//                'team_leader' => $data['team_leader'],
//                'agent' => $data['agent'],
//                'assigned_to' => $data['assigned_to'],
//                'show_tabs' => $data['show_tabs'],
//                'show_frontpage' => $data['show_frontpage'] ?? 0,
//                'opening_hours' => $data['opening_hours'] ?? null,
//                'slug' => \Str::slug($data['company_name']),
//                'hits' => 1,
//                'active' => $data['active'] ?? 0,
//                'claimed' => $data['claimed'] ?? 0,
//                'claimed_by' => $data['claimed'] ? $data['claimed_by'] : Null,
//                'published' => $data['published'] ?? 0,
//                'claimed_on' => null,
//                'api_sync' => null,
//                'inserted_by' => Auth()->user()->id,
//                'updated_by' => Auth()->user()->id,
//            ]);
////todo: add payment update
//            $socialMedia = Socialmedia::where('company_id', $company->id)->first();
//            $socialMediaData = [
//                'company_id' => $company->id,
//                'facebook' => $data['facebook'],
//                'youtube_profile' => $data['youtube'],
//                'youtube_video' => $data['youtube_video'],
//                'twitter' => $data['twitter'],
//                'instagram' => $data['instagram'],
//                'tiktok' => $data['tiktok']
//            ];
//
//            if (empty($socialMedia)) {
//                Socialmedia::create($socialMediaData);
//            } else {
//                $socialMedia->update($socialMediaData);
//            }
//            $company_textedit = CompanyText::where('company_id', $company->id)->first();
//            $company_text = [
//                'company_id' => $company->id,
//                'description_de' => $data['description_de'],
//                'description_fr' => $data['description_fr'],
//                'description_en' => $data['description_en'],
//                'description_it' => $data['description_it']
//            ];
//            if (empty($company_textedit)) {
//                CompanyText::create($company_text);
//            } else {
//                $company_textedit->update($company_text);
//            }
//
//            Recommendation::where('listing_id', $company->id)->delete();
//            if (!empty($data['recommendations'])) {
//                foreach ($data['recommendations'] as $key => $recommendation) {
//                    if ($recommendation['company_name'] != "" || $recommendation['contact_name'] != "") {
//                        Recommendation::create([
//                            'listing_id' => $company->id,
//                            'company_name' => $recommendation['company_name'],
//                            'contact_name' => $recommendation['contact_name'],
//                            'relationship' => $recommendation['relationship'],
//                            'phone' => $recommendation['phone'],
//                        ]);
//                    }
//                }
//            }
//
//            $cat_count = $data['cat_count'];
//            Pricing::where('company_id', $company->id)->delete();
//            $parent_id = null;
//            for ($i = 1; $i < $cat_count; $i++) {
//                if (isset($data['category_title_' . $i])) {
//                    $category = $data['category_title_' . $i];
//                    $pricing = Pricing::create([
//                        'company_id' => $company->id,
//                        'title' => $category,
//                    ]);
//                    $parent_id = $pricing->id;
//                }
//                if (isset($data['title_' . $i])) {
//                    $title = $data['title_' . $i];
//                    $description = $data['description_' . $i];
//                    $price = $data['price_' . $i];
//                    Pricing::create([
//                        'company_id' => $company->id,
//                        'parent_id' => $parent_id,
//                        'title' => $title,
//                        'description' => $description,
//                        'price' => $price,
//                    ]);
//                }
//            }
//        } catch (Exception $e) {
//            DB::rollBack();
//            throw new GeneralException(__('There was a problem updating the company.'));
//        }
//
//        DB::commit();
//        return $company;
//    }

    /**
     * @param  Company  $company
     * @param  array  $data
     *
     * @return Company
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateInformation(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
//            $company_logo = $company->logo;
//            $data['company_logo'] = json_decode($data['company_logo'], true);
//            if (isset($data['company_logo']['output']['image']) && !empty($data['company_logo']['output']['image'])) {
//                $company_logo = '/company_logo/' . $data['company_logo']['output']['name'];
//                $val = $data['company_logo']['output']['image'];
//                $type = $data['company_logo']['output']['type'];
//
//                if (!empty($val)) {
//                    $logo = Image::make($val)->encode($type);
//                    Storage::disk('public')->put($company_logo, $logo);
//                }
//            }

//            $images = Slim::getImages();
//            $image = array_shift($images);
//            //dd($image);
//            $nameSlug = \Str::slug($company->company_name);
//            $companyNameExists = strpos($image['output']['name'],$nameSlug);
//
//            if($companyNameExists){
//                $nameThumbnail = $image['output']['name'];
//            }else{
//                $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
//                $nameThumbnail = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
//            }
//            $img = $image['output']['data'];
//            $output = Slim::saveFile($img, $nameThumbnail, '../storage/app/public/company_thumbnail/'.$company->id.'/',false);

//            $company_thumbnail = $company->thumbnail;
//            $data['company_thumbnail'] = json_decode($data['company_thumbnail'], true);
//            if (isset($data['company_thumbnail']['output']['image']) && !empty($data['company_thumbnail']['output']['image'])) {
//                $company_thumbnail = '/company_thumbnail/' . $data['company_thumbnail']['output']['name'];
//                $val = $data['company_thumbnail']['output']['image'];
//                $type = $data['company_thumbnail']['output']['type'];
//
//                if (!empty($val)) {
//                    $thumbnail = Image::make($val)->encode($type);
//                    Storage::disk('public')->put($company_thumbnail, $thumbnail);
//                }
//            }

            $company->update([
                'uid' => $data['uid'] ?? $company->uid,
                'publications' => $data['publications'] ?? $company->publications,
                'category_id' => $data['category_id'],
                'company_name' => $data['company_name'],
                'company_name_api' => 'lorem',
                //'logo' => $company_logo,
                //'thumbnail' => $nameThumbnail,
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'address' => $data['address'],
                'post_office_box' => null,
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
                'canton' => $data['canton'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'phone_3' => $data['phone_3'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'website' => $data['website'],
                'youtube_video' => $data['youtube_video'],
                'purpose' => null,
                'notes' => $data['notes'] ?? $company->assigned_to,
                'keywords' => $data['keyword'],
                'foundingyear' => $data['founding_year'],
                'team_leader' => $data['team_leader'] ?? $company->team_leader,
                'agent' => $data['agent'] ?? $company->agent,
                'assigned_to' => $data['assigned_to'] ?? $company->assigned_to,
                //'show_tabs' => $data['show_tabs'],
                //'show_frontpage' => $data['show_frontpage'],
                'show_watermark' => $data['show_watermark'],
                'opening_hours' => $data['opening_hours'] ?? null,
                //'slug' => \Str::slug($data['company_name']),
                'hits' => 1,
                //'active' => $data['active'] ?? $company->active,
                //'claimed' => $data['claimed'] ?? $company->claimed,
                //'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                //'published' => $data['published'] ?? $company->published,
                //'claimed_on' => now(),
                'api_sync' => 1,
                //'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);

            $socials = ['facebook','youtube','twitter','instagram','tiktok'];
            foreach ($socials as $social){
                if($data[$social]){
                    $socialMediaData = [
                        'company_id' => $company->id,
                        'platform' => $social,
                        'url' => $data[$social],
                        'icon' => 'fab fa-'.$social,
                        'active' => 1,
                    ];

                    $socialMedia = Socialmedia::query()->where('company_id', $company->id)->where('platform',$social)->first();

                    if (empty($socialMedia)) {
                        Socialmedia::query()->create($socialMediaData);
                    } else {
                        $socialMedia->update($socialMediaData);
                    }
                }
            }

            $company_textedit = CompanyText::query()->where('company_id', $company->id)->first();
            $company_text = [
                'company_id' => $company->id,
                'content' => $data['description_de'],
                'language' => 'de'
            ];
            if (empty($company_textedit)) {
                CompanyText::query()->create($company_text);
            } else {
                $company_textedit->update($company_text);
            }
            CompanyTags::query()->where('company_id',$company->id)->delete();

            if(isset($data['tags'])){
                foreach ($data['tags'] as $key => $tag) {
                    CompanyTags::query()->create([
                        'company_id' => $company->id,
                        'tag_id' => $tag,
                    ]);
                }
            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    /**
     * @param  Company  $company
     * @param  array  $data
     *
     * @return Company
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateFinancePublish(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'category_id' => $data['category_id'] ?? $company->category_id,
                'team_leader' => $data['team_leader'] ?? $company->team_leader,
                'agent' => $data['agent'] ?? $company->agent,
                'assigned_to' => $data['assigned_to'] ?? $company->assigned_to,

                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);

            $companyTabs = CompanyTabs::where('company_id', $company->id)->first();

            $show_news = $company->companytabs->show_news ?? "";
            $show_jobs = $company->companytabs->show_jobs ?? "";
            $companyTabs->update([
                'company_id' => $company->id,
                'show_news' => $data['show_news'] ?? $show_news,
                'show_jobs' => $data['show_jobs'] ?? $show_jobs,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    public function updateRegister(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);

//            $companyTabs = CompanyTabs::where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_register' => $data['show_register'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::query()->create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    public function updateInteraction(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);
//            $companyTabs = CompanyTabs::where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_interraction' => $data['show_interraction'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    public function updateReview(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->id(),
            ]);

//            $companyTabs = CompanyTabs::query()->where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_review' => $data['show_review'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::query()->create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    public function updateContactForm(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);
//            $companyTabs = CompanyTabs::where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_contactform' => $data['show_contactform'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    /**
     * @param  Company  $company
     * @param  array  $data
     *
     * @return Company
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateRecommendations(Company $company, array $data = []): Company
    {

        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);

            Recommendation::query()->where('company_id', $company->id)->delete();
            if (!empty($data['recommendations'])) {
                foreach ($data['recommendations'] as $key => $recommendation) {
                    if ($recommendation['company_name'] != "" || $recommendation['contact_name'] != "") {
                        Recommendation::query()->create([
                            'company_id' => $company->id,
                            'company_name' => $recommendation['company_name'],
                            'contact_name' => $recommendation['contact_name'],
                            'relationship' => $recommendation['relationship'],
                            'phone' => $recommendation['phone'],
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            // dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    /**
     * @param  Company  $company
     * @param  array  $data
     *
     * @return Company
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updatePriceList(Company $company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $cat_count = $data['cat_count'];
            Pricing::query()->where('company_id', $company->id)->delete();
            $parent_id = null;
            for ($i = 1; $i < $cat_count; $i++) {
                if (isset($data['category_title_' . $i])) {
                    $category = $data['category_title_' . $i];
                    $pricing = Pricing::query()->create([
                        'company_id' => $company->id,
                        'title' => $category,
                    ]);
                    $parent_id = $pricing->id;
                }

                if (isset($data['title_' . $i])) {

                    /** Save thumbnail start */
                    $images = Slim::getImages();
                    if(!empty($images)){

                        $image = array_shift($images);
                        $nameSlug = \Str::slug($company->company_name);
                        $companyNameExists = strpos($image['output']['name'],$nameSlug);


                        if($companyNameExists){
                            $name = $image['output']['name'];
                        }else{
                            $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                            $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                            //$name = $c.'_lookon_'.$image_name;
                        }
                        $img = $image['output']['data'];
                        $output = Slim::saveFile($img, $name, '../storage/app/public/pricing_item/'.$company->id.'/',false);
                        $pathNFile = 'pricing_item/'.$company->id.'/'.$name;
                    }else{
                        $pathNFile = $data['xp_'.$i];
                    }
                    /** Save thumbnail end */

                    //$image = array_key_exists('image_' . $i, $data) ? $data['image_' . $i]->store('pricing_item','public') : $data['image_db_' . $i];

                    $title = $data['title_' . $i];
                    $description = $data['description_' . $i];
                    $price = $data['price_' . $i];
                    //$image = in_array('image_'.$i,$data) ? $data['image_' . $i] : NULL;
                    Pricing::query()->create([
                        'company_id' => $company->id,
                        'parent_id' => $parent_id,
                        'title' => $title,
                        'description' => $description,
                        'price' => $price,
                        'image' => $pathNFile
                    ]);
                }
            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the company.'));
        }

        DB::commit();
        return $company;
    }

    public function updateGalleryPage($company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);

//            $companyTabs = CompanyTabs::query()->where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_gallery' => $data['show_gallery'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::query()->create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the gallery.'));
        }
        DB::commit();
        return $company;
    }

    public function updateJobPage($company, array $data = []): Company
    {
        DB::beginTransaction();
        try {
        //    $company->update([
        //        'active' => $data['active'] ?? $company->active,
        //        'published' => $data['published'] ?? $company->published,
        //        'claimed' => $data['claimed'] ?? $company->claimed,
        //        'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
        //        'updated_by' => Auth()->user()->id,
        //    ]);

//            $companyTabs = CompanyTabs::query()->where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_jobs' => $data['show_jobs'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::query()->create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the gallery.'));
        }
        DB::commit();
        return $company;
    }

    public function updateTeamPage($seo, array $data = [], $company): Company
    {
        DB::beginTransaction();
        try {
            $company->update([
                'active' => $data['active'] ?? $company->active,
                'published' => $data['published'] ?? $company->published,
                'claimed' => $data['claimed'] ?? $company->claimed,
                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);

//            $companyTabs = CompanyTabs::where('company_id', $company->id)->first();
//            $companyTabsData = [
//                'company_id' => $company->id,
//                'show_team' => $data['show_team'] ?? 0,
//            ];
//
//            if (empty($companyTabs)) {
//                CompanyTabs::create($companyTabsData);
//            } else {
//                $companyTabs->update($companyTabsData);
//            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the seo.'));
        }
        DB::commit();
        return $company;
    }

    /**
     * @param $company
     * @param array $data
     * @return Team
     * @throws GeneralException
     * @throws \Throwable
     */
    public function storeTeam($company,array $data = []): Team
    {
        DB::beginTransaction();
        try {
            if(array_key_exists('slim',$data)){
                $images = Slim::getImages();
                if(!empty($images)) {
                    $image = array_shift($images);
                    $nameSlug = \Str::slug($company->company_name);
                    $companyNameExists = strpos($image['output']['name'],$nameSlug);
                    if($companyNameExists){
                        $name = $image['output']['name'];
                    }else{
                        $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                        $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                    }
                    $img = $image['output']['data'];
                    $output = Slim::saveFile($img, $name, '../storage/app/public/team_profile_photo/'.$company->id.'/',false);

                    $pathNFile = 'team_profile_photo/'.$company->id.'/'.$name;
                }else{
                    $pathNFile = null;
                }
            }

            $team = $this->team::query()->create([
                'company_id' => $company->id,
                'profile_photo' => $pathNFile,
                'name' => $data['name'],
                'designation' => $data['designation'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'twitter' => $data['twitter'],
                'linkedin' => $data['linkedin'],
                'xing' => $data['xing'],
            ]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the team.'));
        }
        DB::commit();
        return $team;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateTeam($team, array $data = [],$company): Team
    {
        DB::beginTransaction();
        try {
//            $company->update([
//                'active' => $data['active'] ?? $company->active,
//                'published' => $data['published'] ?? $company->published,
//                'claimed' => $data['claimed'] ?? $company->claimed,
//                'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
//                'updated_by' => Auth()->user()->id,
//            ]);

//            $data['profile_photo'] = json_decode($data['profile_photo'],true);
//            if (isset($data['profile_photo']['output']['image']) && !empty($data['profile_photo']['output']['image'])) {
//                if (Storage::disk('public')->exists($team->profile_photo)) {
//                    Storage::disk('public')->delete($team->profile_photo);
//                }
//
//                $profile_photo = '/team_profile_photo/'.$data['profile_photo']['output']['name'];
//
//                $val = $data['profile_photo']['output']['image'];
//                $type = $data['profile_photo']['output']['type'];
//
//                if (!empty($val)) {
//                    $logo      = Image::make($val)->encode($type);
//                    Storage::disk('public')->put($profile_photo, $logo);
//                }
//            }
            if(array_key_exists('slim',$data)){
                $images = Slim::getImages();
                if(!empty($images)){
                    $image = array_shift($images);
                    $nameSlug = \Str::slug($company->company_name);
                    $companyNameExists = strpos($image['output']['name'],$nameSlug);
                    if($companyNameExists){
                        $name = $image['output']['name'];
                    }else{
                        $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                        $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                        //$name = $c.'_lookon_'.$image_name;
                    }
                    $img = $image['output']['data'];
                    $output = Slim::saveFile($img, $name, '../storage/app/public/team_profile_photo/'.$company->id.'/',false);
                    //$galleryId = $image['meta']->gal;
                    // $gallery = Gallery::query()->find($galleryId);

                    $profile_photo = 'team_profile_photo/'.$company->id.'/'.$name;
                }else{
                    $profile_photo = $team->profile_photo;
                }


                //$gallery->update(['image'=>$pathNFile]);
            }

            $team->update([
                'profile_photo' => $profile_photo,
                'name' => $data['name'],
                'designation' => $data['designation'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'twitter' => $data['twitter'],
                'linkedin' => $data['linkedin'],
                'xing' => $data['xing'],
            ]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the team.'));
        }
        DB::commit();
        return $team;
    }

    public function updateSeo($seo, $company, $payment, array $data = []): Seo
    {
        DB::beginTransaction();
        try {
            $company->update([
                //'active' => $data['active'] ?? $company->active,
                //'published' => $data['published'] ?? $company->published,
                //'claimed' => $data['claimed'] ?? $company->claimed,
                //'claimed_by' => ($data['claimed'] ?? $company->claimed) ? ($data['claimed_by'] ?? $company->claimed_by) : null,
                'updated_by' => Auth()->user()->id,
            ]);

//            $paymentData = [
//                'transaction_id' => random_bytes(2),
//                'company_id' => $company->id,
//                'payment_method' => 'undefined',
//                'detail' => 'undefined',
//                'raw_data' => 'undefined',
//                'payer' => $data['payer'],
//                'not_payer_reason' => $data['not_payer_reason'],
//                'price_contract' => $data['price_contract'],
//                'price_actual' => $data['price_actual']
//            ];

//            if($company->payment){
//                $company->payment->update($paymentData);
//            }else{
//                Payment::query()->create($paymentData);
//            }

            $tabs = ['information','interraction','job','kontaktformular','empfehlungen','preisliste','team','news','galerie','review'];

            foreach($tabs as $tab){
                $types = ['title','description'];
                foreach($types as $type){
                    $languages = ['de','fr','en','it'];
                    foreach($languages as $language){
                        $seo_data = [
                            'company_id' => $company->id,
                            'tab' => $tab,
                            'type' => $type,
                            'content' => $data[$tab.'_meta'.$type.'_'.$language],
                            'language' => $language,
                        ];
                        if (!empty($company->seo)) {
                            $company->seo->update($seo_data);
                        } else {
                            $seo = Seo::query()->create($seo_data);
                        }
                    }
                }
            }

//            $seo_data = [
//                'company_id' => $company->id,
//                'information_metatitle_de' => $data['information_metatitle_de'] ?? null,
//                'information_metadescription_de' => $data['information_metadescription_de'] ?? null,
//                'information_metatitle_ft' => $data['information_metatitle_ft'] ?? null,
//                'information_metadescription_ft' => $data['information_metadescription_ft'] ?? null,
//                'information_metatitle_en' => $data['information_metatitle_en'] ?? null,
//                'information_metadescription_en' => $data['information_metadescription_en'] ?? null,
//                'information_metatitle_it' => $data['information_metatitle_it'] ?? null,
//                'information_metadescription_it' => $data['information_metadescription_it'] ?? null,
//
//                'interraction_metatitle_de' => $data['interraction_metatitle_de'] ?? null,
//                'interraction_metadescription_de' => $data['interraction_metadescription_de'] ?? null,
//                'interraction_metatitle_ft' => $data['interraction_metatitle_ft'] ?? null,
//                'interraction_metadescription_ft' => $data['interraction_metadescription_ft'] ?? null,
//                'interraction_metatitle_en' => $data['interraction_metatitle_en'] ?? null,
//                'interraction_metadescription_en' => $data['interraction_metadescription_en'] ?? null,
//                'interraction_metatitle_it' => $data['interraction_metatitle_it'] ?? null,
//                'interraction_metadescription_it' => $data['interraction_metadescription_it'] ?? null,
//
//                'job_metatitle_de' => $data['job_metatitle_de'] ?? null,
//                'job_metadescription_de' => $data['job_metadescription_de'] ?? null,
//                'job_metatitle_ft' => $data['job_metatitle_ft'] ?? null,
//                'job_metadescription_ft' => $data['job_metadescription_ft'] ?? null,
//                'job_metatitle_en' => $data['job_metatitle_en'] ?? null,
//                'job_metadescription_en' => $data['job_metadescription_en'] ?? null,
//                'job_metatitle_it' => $data['job_metatitle_it'] ?? null,
//                'job_metadescription_it' => $data['job_metadescription_it'] ?? null,
//
//                'kontaktformular_metatitle_de' => $data['kontaktformular_metatitle_de'] ?? null,
//                'kontaktformular_metadescription_de' => $data['kontaktformular_metadescription_de'] ?? null,
//                'kontaktformular_metatitle_ft' => $data['kontaktformular_metatitle_ft'] ?? null,
//                'kontaktformular_metadescription_ft' => $data['kontaktformular_metadescription_ft'] ?? null,
//                'kontaktformular_metatitle_en' => $data['kontaktformular_metatitle_en'] ?? null,
//                'kontaktformular_metadescription_en' => $data['kontaktformular_metadescription_en'] ?? null,
//                'kontaktformular_metatitle_it' => $data['kontaktformular_metatitle_it'] ?? null,
//                'kontaktformular_metadescription_it' => $data['kontaktformular_metadescription_it'] ?? null,
//
//                'empfehlungen_metatitle_de' => $data['empfehlungen_metatitle_de'] ?? null,
//                'empfehlungen_metadescription_de' => $data['empfehlungen_metadescription_de'] ?? null,
//                'empfehlungen_metatitle_ft' => $data['empfehlungen_metatitle_ft'] ?? null,
//                'empfehlungen_metadescription_ft' => $data['empfehlungen_metadescription_ft'] ?? null,
//                'empfehlungen_metatitle_en' => $data['empfehlungen_metatitle_en'] ?? null,
//                'empfehlungen_metadescription_en' => $data['empfehlungen_metadescription_en'] ?? null,
//                'empfehlungen_metatitle_it' => $data['empfehlungen_metatitle_it'] ?? null,
//                'empfehlungen_metadescription_it' => $data['empfehlungen_metadescription_it'] ?? null,
//
//                'preisliste_metatitle_de' => $data['preisliste_metatitle_de'] ?? null,
//                'preisliste_metadescription_de' => $data['preisliste_metadescription_de'] ?? null,
//                'preisliste_metatitle_ft' => $data['preisliste_metatitle_ft'] ?? null,
//                'preisliste_metadescription_ft' => $data['preisliste_metadescription_ft'] ?? null,
//                'preisliste_metatitle_en' => $data['preisliste_metatitle_en'] ?? null,
//                'preisliste_metadescription_en' => $data['preisliste_metadescription_en'] ?? null,
//                'preisliste_metatitle_it' => $data['preisliste_metatitle_it'] ?? null,
//                'preisliste_metadescription_it' => $data['preisliste_metadescription_it'] ?? null,
//
//                'team_metatitle_de' => $data['team_metatitle_de'] ?? null,
//                'team_metadescription_de' => $data['team_metadescription_de'] ?? null,
//                'team_metatitle_ft' => $data['team_metatitle_ft'] ?? null,
//                'team_metadescription_ft' => $data['team_metadescription_ft'] ?? null,
//                'team_metatitle_en' => $data['team_metatitle_en'] ?? null,
//                'team_metadescription_en' => $data['team_metadescription_en'] ?? null,
//                'team_metatitle_it' => $data['team_metatitle_it'] ?? null,
//                'team_metadescription_it' => $data['team_metadescription_it'] ?? null,
//
//                'news_metatitle_de' => $data['news_metatitle_de'] ?? null,
//                'news_metadescription_de' => $data['news_metadescription_de'] ?? null,
//                'news_metatitle_ft' => $data['news_metatitle_ft'] ?? null,
//                'news_metadescription_ft' => $data['news_metadescription_ft'] ?? null,
//                'news_metatitle_en' => $data['news_metatitle_en'] ?? null,
//                'news_metadescription_en' => $data['news_metadescription_en'] ?? null,
//                'news_metatitle_it' => $data['news_metatitle_it'] ?? null,
//                'news_metadescription_it' => $data['news_metadescription_it'] ?? null,
//
//                'galerie_metatitle_de' => $data['galerie_metatitle_de'] ?? null,
//                'galerie_metadescription_de' => $data['galerie_metadescription_de'] ?? null,
//                'galerie_metatitle_ft' => $data['galerie_metatitle_ft'] ?? null,
//                'galerie_metadescription_ft' => $data['galerie_metadescription_ft'] ?? null,
//                'galerie_metatitle_en' => $data['galerie_metatitle_en'] ?? null,
//                'galerie_metadescription_en' => $data['galerie_metadescription_en'] ?? null,
//                'galerie_metatitle_it' => $data['galerie_metatitle_it'] ?? null,
//                'galerie_metadescription_it' => $data['galerie_metadescription_it'] ?? null,
//
//                'rating_metatitle_de' => $data['rating_metatitle_de'] ?? null,
//                'rating_metadescription_de' => $data['rating_metadescription_de'] ?? null,
//                'rating_metatitle_ft' => $data['rating_metatitle_ft'] ?? null,
//                'rating_metadescription_ft' => $data['rating_metadescription_ft'] ?? null,
//                'rating_metatitle_en' => $data['rating_metatitle_en'] ?? null,
//                'rating_metadescription_en' => $data['rating_metadescription_en'] ?? null,
//                'rating_metatitle_it' => $data['rating_metatitle_it'] ?? null,
//                'rating_metadescription_it' => $data['rating_metadescription_it'] ?? null,
//            ];


//            if (!empty($company->seo)) {
//                $company->seo->update($seo_data);
//            } else {
//                $seo = Seo::query()->create($seo_data);
//            }
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the seo.'));
        }
        DB::commit();
        return $seo;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function storeNews($company, array $data = []): News
    {
        DB::beginTransaction();
        try {
            $news_image = "";
            if(array_key_exists('slim',$data)) {
                $images = Slim::getImages();
                $image = array_shift($images);
                $nameSlug = \Str::slug($company->company_name);
                $companyNameExists = strpos($image['output']['name'], $nameSlug);
                if ($companyNameExists) {
                    $name = $image['output']['name'];
                } else {
                    $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                    $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                }
                $img = $image['output']['data'];
                $output = Slim::saveFile($img, $name, '../storage/app/public/news_image/' . $company->id . '/', false);

                $news_image = 'news_image/' . $company->id . '/' . $name;
            }
            //$gallery->update(['image'=>$pathNFile]);
//            if (!empty($data['image'])) {
//                $val = $data['image'];
//                if (!empty($val)) {
//                    $news_image = $val->store('/news_image/'.$company->id, 'public');
//                }
//            }

            $news = $this->news::query()->create([
                'company_id' => $company->id,
                'image' => $news_image,
                'published_at' => $data['published_at'] ?? now(),
                'title' => $data['title'],
                'author' => $data['author'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the news.'));
        }
        DB::commit();
        return $news;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateNews($news, array $data = []): News
    {
        DB::beginTransaction();
        try {

            if(array_key_exists('slim',$data)) {
                $images = Slim::getImages();
                if(!empty($images)){
                    $image = array_shift($images);
                    $nameSlug = \Str::slug($news->company->company_name);
                    $companyNameExists = strpos($image['output']['name'], $nameSlug);
                    if ($companyNameExists) {
                        $name = $image['output']['name'];
                    } else {
                        $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                        $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                    }
                    $img = $image['output']['data'];
                    $output = Slim::saveFile($img, $name, '../storage/app/public/news_image/' . $news->company->id . '/', false);

                    $news_image = 'news_image/' . $news->company->id . '/' . $name;
                }else{
                    $news_image = $news->image;
                }
            }
//            if (!empty($data['image'])) {
//                $val = $data['image'];
//                if (!empty($val)) {
//                    $news_image = $val->store('/news_image', 'public');
//                }
//            }

            $news->update([
                'image' => $news_image,
                'published_at' => $data['published_at'] ?? now(),
                'title' => $data['title'],
                'author' => $data['author'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the news.'));
        }
        DB::commit();
        return $news;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function storeJob($company, array $data = []): JobApplication
    {
        DB::beginTransaction();
        try {

            $job = $this->job::query()->create([
                'company_id' => $company->id,
                'title' => $data['job_title'],
                'location' => $data['job_location'],
                'start_date' => $data['job_start_date'],
                'expire_date' => $data['job_expire_date'],
                'skill' => $data['job_skill'],
                'type' => $data['job_type'],
                'position' => $data['job_position'],
                'description' => $data['job_description'],
                'active' => $data['active'] ?? 0,
            ]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the job.'));
        }
        DB::commit();
        return $job;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateJob($job, array $data = []): JobApplication
    {
        DB::beginTransaction();
        try {
            $job->update([
                'title' => $data['job_title'],
                'location' => $data['job_location'],
                'start_date' => $data['job_start_date'],
                'expire_date' => $data['job_expire_date'],
                'skill' => $data['job_skill'],
                'type' => $data['job_type'],
                'position' => $data['job_position'],
                'description' => $data['job_description'],
                'active' => $data['active'] ?? 0,
            ]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the job.'));
        }
        DB::commit();
        return $job;
    }

    /**
     * @param  Company  $company
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Company $company): bool
    {
        if ($this->deleteById($company->id)) {
            return true;
        }
        throw new GeneralException(__('There was a problem deleting the company.'));
    }

    public function storeGallery(array $data = [], $company): Gallery
    {
        DB::beginTransaction();
        try {
            $gallery_image = "/";
            $data['gallery_image'] = json_decode($data['image'], true);
            if (isset($data['gallery_image']['output']['image']) && !empty($data['gallery_image']['output']['image'])) {
                // $gallery_image = '/gallery_image/'.$data['gallery_image']['output']['name'];
                $ext = pathinfo($data['gallery_image']['output']['name'], PATHINFO_EXTENSION);
                $company_name = \Str::slug($company->company_name) . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                $gallery_image = 'gallery_image/'.$company->id.'/' . $company_name;
                $val = $data['gallery_image']['output']['image'];
                $type = $data['gallery_image']['output']['type'];

                if (!empty($val)) {
                    $image      = Image::make($val)->encode($type);
                    Storage::disk('public')->put($gallery_image, $image);
                }
            }

            $gallery = $this->gallery::query()->create([
                'company_id' => $company->id,
                'image' => $gallery_image,
                'show_on_frontside' => $data['show_on_frontside'] ?? 0,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the gallery.'));
        }
        DB::commit();
        return $gallery;
    }


    public function  updateGallery($company,$data = []): Gallery
    {
        if(array_key_exists('slim',$data)){
            // **********************
            // Slim update code start
            // **********************
            $images = Slim::getImages();

            // Should always be one image (when posting async), so we'll use the first on in the array (if available)
            $image = array_shift($images);

            // get the name of the file
            $nameSlug = \Str::slug($company->company_name);
            $companyNameExists = strpos($image['output']['name'],$nameSlug);


            if($companyNameExists){
                $name = $image['output']['name'];
            }else{
                $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
                //$name = $c.'_lookon_'.$image_name;
            }
            //dd($name);

            // get the crop data for the output image
            $data = $image['output']['data'];

            // If you want to store the file in another directory pass the directory name as the third parameter.
            $output = Slim::saveFile($data, $name, '../storage/app/public/gallery_image/'.$company->id.'/',false);

            // **********************
            // Slim update code ends
            // ************************

            $galleryId = $image['meta']->gal;
            $gallery = Gallery::query()->find($galleryId);

            $pathNFile = 'gallery_image/'.$company->id.'/'.$name;

            $gallery->update(['image'=>$pathNFile]);
        }else{
            $gallery = Gallery::query()->find($data['gal']);
            $status = $data['status'] == "true" ? 1 : 0;
            $gallery->update(['show_on_frontside'=>$status]);
        }


        //dd($output);
        //dd($image[0]['meta']);
        //dd(json_decode($data['image']),true);
//        if(in_array('gal',$image['meta'])){
//            $gallery = Gallery::query()->find($image['meta']);
//            $status = $gallery->show_on_frontside;
//        }
//        DB::beginTransaction();
//        try {
//            if(isset($data['gallery_image'])){
//                $gallery_image = "/";
//                $data['gallery_image'] = json_decode($data['gallery_image'], true);
//
//                $gallery = Gallery::query()->find($data['gallery_image']['meta']['gal']);
//                $status = $gallery->show_on_frontside;
//
//                //dd($data['gallery_image']);
//
//                if (isset($data['gallery_image']['output']['image']) && !empty($data['gallery_image']['output']['image'])) {
//                    // $gallery_image = '/gallery_image/'.$data['gallery_image']['output']['name'];
//                    $ext = pathinfo($data['gallery_image']['output']['name'], PATHINFO_EXTENSION);
//                    $company_name = strtolower(str_replace(' ', '', $company->company_name)) . '_lookon_' . rand(11111, 99999) . '.' . $ext;
//                    $gallery_image = 'gallery_image/'.$company->id.'/'. $company_name;
//                    $val = $data['gallery_image']['output']['image'];
//                    $type = $data['gallery_image']['output']['type'];
//
//                    if (!empty($val)) {
//                        $image = Image::make($val)->encode($type);
//                        Storage::disk('public')->put($gallery_image, $image);
//                    }
//                }
//            }else{
//                $gallery_image = $gallery->image;
//                $status = $data['status'] == "true" ? 1 : 0;
//            }
//
//            $gallery->update([
//                //'company_id' => $company->id,
//                'image' => $gallery_image,
//                'show_on_frontside' => $status,
//            ]);
//        } catch (Exception $e) {
//            dd($e);
//            DB::rollBack();
//            throw new GeneralException(__('There was a problem updating the gallery.'));
//        }
//        DB::commit();
        return $gallery;
    }

    /**
     * @param  array  $data
     *
     * @return Contact
     * @throws GeneralException
     * @throws \Throwable
     */
    public function storeContactUs($company, array $data = []): Contact
    {
        //dd($data);
        DB::beginTransaction();
        try {
            $contact = $this->contact::query()->create([
                'gen_private_person' => $data['gen_private_person'] ?? null,
                'company_id' => $company->id,
                'gen_company_name' => $data['company_name'],
                //'gen_salutation' => $data['title'],
                'gen_firstname' => $data['firstname'],
                'gen_lastname' => $data['lastname'],
                'gen_postcode' => $data['postcode'],
                'gen_city' => $data['city'],
                'gen_email' => $data['gen_email'],
                'gen_phone' => $data['phone'],
                'message' => $data['message'],
                'agb' => $data['term_condition'],
            ]);

            $body = [
                //'title' => $data['title'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['gen_email'],
                'phone' => $data['phone'],
                'url' => route('frontend.panel.contactus.show',$contact),
            ];

            Mail::to($company->email)->send(new CompanyContactUsMail($body,$company, $contact));

            Session::flash('success',__('Your message has been sent. We will contact you soon'));
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem submitting the detail.'));
        }
        DB::commit();
        return $contact;
    }

    public function storeOffers($company, array $data = []): Offers
    {
        DB::beginTransaction();
        try {
            $offer = $this->offers::query()->create([
                'gen_privateperson' => $data['private_person']??0,
                'company_id' => $company->id,
                'gen_company_name' => $data['company_name'],
                //'gen_salutation' => $data['title'],
                'gen_firstname' => $data['firstname'],
                'gen_lastname' => $data['lastname'],
                'gen_postcode' => $data['postcode'],
                'gen_city' => $data['city'],
                'gen_email' => $data['gen_email'],
                'gen_phone' => $data['phone'],
                'message' => $data['message'],
                'agb' => $data['term_condition'],

            ]);

            $offerfield = $company->category->offerfield;
            foreach ($offerfield as $key => $list) {
                $answer = '';
                if($list->type == "text" || $list->type == "textarea" || $list->type == "dropdown")  {
                    $answer = $data['offerfield_'.$list->id] ?? "";
                } else {
                    if(isset($data['offerfield_'.$list->id])) {
                        $answer = serialize($data['offerfield_'.$list->id]);
                    }
                }

                $this->offersFieldAnswer::query()->create([
                    'company_offer_id' => $offer->id,
                    'offerfield_id' => $list->id,
                    'answer' => $answer,
                ]);
            }

            $body = [
                'company_name' => $data['company_name'],
                //'title' => $data['title'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'url' => route('frontend.panel.offers.show',$offer),
            ];

            Mail::to($company->email)->locale('bn')->send(new CompanyOfferMail($body,$company));
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem submiiting the detail.'));
        }
        DB::commit();
        return $offer;
    }

    public function storeApplyJob($company, $job, array $data = []): Application
    {
        DB::beginTransaction();
        try {
            $data_arr = [
                'company_id' => $company->id,
                'job_id' => $job->id,
                'title' => $data['title'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'date_of_birth' => $data['date_of_birth'],
                'civil_status' => $data['civil_status'],
                'motivation_letter' => $data['motivation_letter'],
                'CV' => $data['CV'],
                'certificate_of_employment' => $data['certificate_of_employment'],
                'diplomas_and_certificates' => $data['diplomas_and_certificates'],
                'message' => $data['message'],
            ];

            if (!empty($data['motivation_letter'])) {
                $data_arr['motivation_letter'] = $data['motivation_letter']->store('/job_application/motivation_letter', 'public');
            }
            if (!empty($data['CV'])) {
                $data_arr['CV'] = $data['CV']->store('/job_application/CV', 'public');
            }
            if (!empty($data['certificate_of_employment'])) {
                $data_arr['certificate_of_employment'] = $data['certificate_of_employment']->store('/job_application/certificate_of_employment', 'public');
            }
            if (!empty($data['diplomas_and_certificates'])) {
                $data_arr['diplomas_and_certificates'] = $data['diplomas_and_certificates']->store('/job_application/diplomas_and_certificates', 'public');
            }

            $application = $this->application::query()->create($data_arr);

            $body = [
                'title' => $data['title'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'url' => route('frontend.panel.job_application.show',$application),
            ];

            Mail::to($company->email)->send(new CompanyApplyJobMail($body,$company, $job));
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem submitting the detail.'));
        }
        DB::commit();
        return $application;
    }

    public function storeReviews($company, array $data = []): Reviews
    {
        DB::beginTransaction();
        try {

            $image = [];
            if (!empty($data['images'])) {
                foreach ($data['images'] as $pic){
                    $image []= $pic->store('/company_reviews', 'public');
                }
            }

            $review = $this->reviews::query()->create([
                'company_id' => $company->id,
                'user_id' => (Auth()->check()) ? Auth()->id() : null,
                'firstname' => (Auth()->check()) ? Auth()->user()->userdetails->firstname : $data['firstname'],
                'lastname' => (Auth()->check()) ? Auth()->user()->userdetails->lastname : $data['lastname'],
                'email' => (Auth()->check()) ? auth()->user()->email : $data['email'],
                'review' => $data['review_message'],
                'image' => json_encode($image),
                'postcode' => (Auth()->check()) ? auth()->user()->userdetails->postcode : $data['postcode'],
                'city' => (Auth()->check()) ? auth()->user()->userdetails->city : $data['city'],
            ]);

            if(!empty($data['review'])) {
                foreach ($data['review'] as $review_criteria_id => $review_rating) {
                    $this->reviewrating->create([
                        'review_id' => $review->id,
                        'review_criteria_id' => $review_criteria_id,
                        'listing_id' => $company->id,
                        'listing_type' => 'company',
                        'rating' => $review_rating,
                    ]);
                }
            }

            $body = [
                'company_name' => $company->company_name,
                'firstname' => (!Auth()->user()) ? $data['firstname'] : Auth()->user()->userdetails->firstname,
                'lastname' => (!Auth()->user()) ? $data['lastname'] : Auth()->user()->userdetails->lastname,
                'email' => (!Auth()->user()) ? $data['email'] : Auth()->user()->email,
                'url' => route('frontend.panel.reviews.show',$review),
            ];
            // dd($body);
            Mail::to($company->email)->send(new CompanyReviewMail($body,$company));
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem submitting the detail.'));
        }
        DB::commit();
        return $review;
    }

    public function storeReplay(array $data = [], $review): ReviewReply
    {
        DB::beginTransaction();
        try {
            $ReviewReply = $this->ReviewReply::create([
                'review_id' => $review->id,
                'replay_message' => $data['replay_message'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem submiiting the detail.'));
        }
        DB::commit();
        return $ReviewReply;
    }

    public function storeHitListing(Company $company): Company
    {
        $new_visit = 0;
        if ((strtotime('1 hours', session('views'.$_SERVER['REQUEST_URI'].$_SERVER['REMOTE_ADDR']))) < time()) {
            $new_visit = 1;
        }

        session()->put('views'.$_SERVER['REQUEST_URI'].$_SERVER['REMOTE_ADDR'],time());
        if ($new_visit != 0) {
            $company->increment('hits');
        }

        return $company;
    }
}

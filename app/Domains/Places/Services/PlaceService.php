<?php

namespace App\Domains\Places\Services;

use App\Domains\Company\Models\CompanyTabs;
use App\Domains\Places\Models\Place;
use App\Domains\Places\Models\PlaceGallery;
use Exception;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Storage;
use App\Domains\Places\Models\PlaceReviews;
use App\Models\ReviewRating;

/**
 * Class PlaceService.
 */
class PlaceService extends BaseService
{
    /**
     * PlaceService constructor.
     *
     * @param  Place  $place
     * @param  News  $news
     * @param  JobApplication  $job
     */
    public function __construct(Place $place,PlaceGallery $gallery,PlaceReviews $reviews,ReviewRating $reviewrating)
    {
        $this->model = $place;
        $this->gallery = $gallery;
        $this->reviews = $reviews;
        $this->reviewrating = $reviewrating;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Place
    {
        DB::beginTransaction();
        try {

            $image_logo = "/";
            $data['image_logo'] = json_decode($data['image_logo'], true);
            if (isset($data['image_logo']['output']['image']) && !empty($data['image_logo']['output']['image'])) {
                $image_logo = '/image_logo/' . $data['image_logo']['output']['name'];
                $val = $data['image_logo']['output']['image'];
                $type = $data['image_logo']['output']['type'];

                if (!empty($val)) {
                    $logo      = Image::make($val)->encode($type);
                    Storage::disk('public')->put($image_logo, $logo);
                }
            }


            $place = $this->model::query()->create([
                'category_id' => $data['category_id'],
                'place_name' => $data['place_name'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'address' => $data['address'],
                'post_box_office' => $data['post_box_office'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'canton' => $data['canton'],
                'country' => $data['country'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'phone_3' => $data['phone_3'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'website' => $data['website'],
                'description_de' => $data['description_de'],
                'description_fr' => $data['description_fr'],
                'description_en' => $data['description_en'],
                'description_it' => $data['description_it'],
                'tags' => $data['tags'],
                'facebook' => $data['facebook'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],
                'image_logo' => $image_logo,
                'slug' => \Str::slug($data['place_name']),
                'opening_hours' => $data['opening_hours'] ?? null,


                'notes' => $data['notes'],
                'active' => (isset($data['active']) && $data['active'] == 1) ? "yes" : "no",
                'published' => $data['published'] ?? 0,
            ]);

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
			// dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $place;
    }

    /**
     * @param  Place  $place
     * @param  array  $data
     *
     * @return Place
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Place $place, array $data = []): Place
    {

        DB::beginTransaction();
        try {
            $image_logo = "/";
            $data['image_logo'] = json_decode($data['image_logo'], true);
            if (isset($data['image_logo']['output']['image']) && !empty($data['image_logo']['output']['image'])) {
                $image_logo = '/image_logo/' . $data['image_logo']['output']['name'];
                $val = $data['image_logo']['output']['image'];
                $type = $data['image_logo']['output']['type'];

                if (!empty($val)) {
                    $logo      = Image::make($val)->encode($type);
                    Storage::disk('public')->put($image_logo, $logo);
                }
            }

            $place->update([
                // 'payer' => $data['payer'] ?? null,
                // 'not_payer_reason' => $data['not_payer_reason'],
                // 'price_contract' => $data['price_contract'],
                // 'price_actual' => $data['price_actual'],
                'category_id' => $data['category_id'],
                // 'team_leader' => $data['team_leader'],
                // 'agent' => $data['agent'],
                // 'assigned_to' => $data['assigned_to'],
                'image_logo' => $image_logo,
                'place_name' => $data['place_name'],
				'slug' => \Str::slug($data['place_name']),
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'address' => $data['address'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'phone_3' => $data['phone_3'],
                'mobile' => $data['mobile'],
                'opening_hours' => $data['opening_hours'] ?? null,

                'website' => $data['website'],
                'facebook' => $data['facebook'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],

                'description_de' => $data['description_de'],
                'description_fr' => $data['description_fr'],
                'description_en' => $data['description_en'],
                'description_it' => $data['description_it'],
                'notes' => $data['notes'],
                'active' => ($data['active'] == 1) ? "yes" : "no",
                'published' => $data['published'] ?? 0,
                // 'claimed' => $data['claimed'] ?? 0,
                // 'inserted_by' => Auth()->user()->id,

                // 'show_interraction' => $data['show_interraction'] ?? "no",
                // 'show_rating' => $data['show_rating'] ?? 0,
                // 'show_kontaktformular' => $data['show_kontaktformular'] ?? 0,

                'updated_by' => Auth()->user()->id,
            ]);

            // $socialMedia = Socialmedia::where('company_id', $company->id)->first();
            // $socialMediaData = [
            //     'company_id' => $company->id,
            //     'facebook' => $data['facebook'],
            //     'youtube_profile' => $data['youtube'],
            //     'youtube_video' => $data['youtube_video'],
            //     'twitter' => $data['twitter'],
            //     'instagram' => $data['instagram'],
            //     'tiktok' => $data['tiktok']
            // ];

            // if (empty($socialMedia)) {
            //     Socialmedia::create($socialMediaData);
            // } else {
            //     $socialMedia->update($socialMediaData);
            // }

            // Recommendation::where('listing_id', $company->id)->delete();
            // if (!empty($data['recommendations'])) {
            //     foreach ($data['recommendations'] as $key => $recommendation) {
            //         if ($recommendation['company_name'] != "" || $recommendation['contact_name'] != "") {
            //             Recommendation::create([
            //                 'listing_id' => $company->id,
            //                 'company_name' => $recommendation['company_name'],
            //                 'contact_name' => $recommendation['contact_name'],
            //                 'relationship' => $recommendation['relationship'],
            //                 'phone' => $recommendation['phone'],
            //             ]);
            //         }
            //     }
            // }

            // $cat_count = $data['cat_count'];
            // Pricing::where('company_id', $company->id)->delete();
            // $parent_id = null;
            // for ($i = 1; $i < $cat_count; $i++) {
            //     if (isset($data['category_title_' . $i])) {
            //         $category = $data['category_title_' . $i];
            //         $pricing = Pricing::create([
            //             'company_id' => $company->id,
            //             'title' => $category,
            //         ]);
            //         $parent_id = $pricing->id;
            //     }
            //     if (isset($data['title_' . $i])) {
            //         $title = $data['title_' . $i];
            //         $description = $data['description_' . $i];
            //         $price = $data['price_' . $i];
            //         Pricing::create([
            //             'company_id' => $company->id,
            //             'parent_id' => $parent_id,
            //             'title' => $title,
            //             'description' => $description,
            //             'price' => $price,
            //         ]);
            //     }
            // }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the place.'));
        }

        DB::commit();
        return $place;
    }

    /**
     * @param  Place  $place
     * @param  array  $data
     *
     * @return Place
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateInformation(Place $place, array $data = []): Place
    {
        DB::beginTransaction();
        try {
            $image_logo = "/";
            $data['image_logo'] = json_decode($data['image_logo'], true);
            if (isset($data['image_logo']['output']['image']) && !empty($data['image_logo']['output']['image'])) {
                $image_logo = '/image_logo/' . $data['image_logo']['output']['name'];
                $val = $data['image_logo']['output']['image'];
                $type = $data['image_logo']['output']['type'];

                if (!empty($val)) {
                    $logo      = Image::make($val)->encode($type);
                    Storage::disk('public')->put($image_logo, $logo);
                }
            }

            $place->update([
                'category_id' => $data['category_id'],
                'image_logo' => $image_logo,
                'place_name' => $data['place_name'],
				'slug' => \Str::slug($data['place_name']),
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'address' => $data['address'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'phone_3' => $data['phone_3'],
                'mobile' => $data['mobile'],
                'opening_hours' => $data['opening_hours'] ?? null,

                'website' => $data['website'],
                'facebook' => $data['facebook'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],

                'description_de' => $data['description_de'],
                'description_fr' => $data['description_fr'],
                'description_en' => $data['description_en'],
                'description_it' => $data['description_it'],
                'notes' => $data['notes'],
                'active' => ($data['active'] == 1) ? "yes" : "no",
                'published' => $data['published'] ?? 0,
                'updated_by' => Auth()->user()->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the place.'));
        }

        DB::commit();
        return $place;
    }

    /**
     * @param  Place  $place
     * @param  array  $data
     *
     * @return Company
     * @throws GeneralException
     * @throws \Throwable
     */
    public function updateFinancePublish(Place $place, array $data = []): Place
    {
        DB::beginTransaction();
        try {
            $place->update([
                'payer' => $data['payer'] ?? null,
                'not_payer_reason' => $data['not_payer_reason'],
                'price_contract' => $data['price_contract'],
                'price_actual' => $data['price_actual'],
                'active' => ($data['active'] == 1) ? "yes" : "no",
                'published' => $data['published'] ?? 0,
                'claimed' => $data['claimed'] ?? 0,
                'updated_by' => Auth()->user()->id,
            ]);

            $companyTabs = CompanyTabs::query()->where('company_id', $company->id)->first();

            $show_news = $company->companytabs->show_news ?? "";
            $show_jobs = $company->companytabs->show_jobs ?? "";
            $companyTabs->update([
                'company_id' => $company->id,
                'show_news' => $data['show_news'] ?? $show_news,
                'show_jobs' => $data['show_jobs'] ?? $show_jobs,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the place.'));
        }

        DB::commit();
        return $company;
    }

    public function updateContactForm(Place $place, array $data = []): Place
    {

        DB::beginTransaction();
        try {
            $place->update([
                'active' => ($data['active'] == 1) ? "yes" : "no",
                'show_kontaktenformular' => $data['show_contactform'] ?? 0,
                'updated_by' => Auth()->user()->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the place.'));
        }

        DB::commit();
        return $place;
    }

    public function updateSeo($place, array $data = []): Place
    {
        DB::beginTransaction();
        try {
            $place->update([
                'active' => ($data['active'] == 1) ? "yes" : "no",
                'meta_title_de' => $data['meta_title_de'] ?? null,
                'meta_description_de' => $data['meta_description_de'] ?? null,
                'meta_title_fr' => $data['meta_title_fr'] ?? null,
                'meta_description_fr' => $data['meta_description_fr'] ?? null,
				'meta_title_en' => $data['meta_title_en'] ?? null,
                'meta_description_en' => $data['meta_description_en'] ?? null,
				'meta_title_it' => $data['meta_title_it'] ?? null,
                'meta_description_it' => $data['meta_description_it'] ?? null,
                'updated_by' => Auth()->user()->id,
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the seo.'));
        }
        DB::commit();
        return $place;
    }

    /**
     * @param  array  $data
     *
     * @return Agency
     * @throws GeneralException
     * @throws \Throwable
     */
    public function storeNews(array $data = [], $company): News
    {
        DB::beginTransaction();
        try {
            $news_image = "";
            if (!empty($data['news_image'])) {
                $val = $data['news_image'];
                if (!empty($val)) {
                    $news_image = $val->store('/news_image', 'public');
                }
            }

            $news = $this->news::create([
                'company_id' => $company->id,
                'picture' => $news_image,
                'published' => $data['show_news'] ?? 0,
                'title' => $data['news_title'],
                'author' => $data['news_author'],
                'description' => $data['news_description'],
            ]);
        } catch (Exception $e) {
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
            $news_image = $news->picture;
            if (!empty($data['news_image'])) {
                $val = $data['news_image'];
                if (!empty($val)) {
                    $news_image = $val->store('/news_image', 'public');
                }
            }

            $news->update([
                'picture' => $news_image,
                'published' => $data['show_news'] ?? 0,
                'title' => $data['news_title'],
                'author' => $data['news_author'],
                'description' => $data['news_description'],
            ]);
        } catch (Exception $e) {
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
    public function storeJob(array $data = [], $company): JobApplication
    {
        DB::beginTransaction();
        try {

            $job = $this->job::create([
                'company_id' => $company->id,
                'title' => $data['job_title'],
                'location' => $data['job_location'],
                'start_date' => $data['job_start_date'],
                'skill' => $data['job_skill'],
                'type' => $data['job_type'],
                'description' => $data['job_description'],
                'active' => ($data['active'] == 1) ? "yes" : "no",
            ]);
        } catch (Exception $e) {
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
                'skill' => $data['job_skill'],
                'type' => $data['job_type'],
                'description' => $data['job_description'],
                'active' => ($data['active'] == 1) ? "yes" : "no",
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the job.'));
        }
        DB::commit();
        return $job;
    }


    /**
     * @param  Place  $place
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Place $place): bool
    {
        if ($this->deleteById($place->id)) {
            return true;
        }
        throw new GeneralException(__('There was a problem deleting the company.'));
    }

    public function storeGallery(array $data = [], $place): PlaceGallery
    {
        DB::beginTransaction();
        try {
            $gallery_image = "/";
            $data['place_gallery'] = json_decode($data['image'], true);
            if (isset($data['place_gallery']['output']['image']) && !empty($data['place_gallery']['output']['image'])) {
                $gallery_image = '/place_gallery/' . $data['place_gallery']['output']['name'];
                $val = $data['place_gallery']['output']['image'];
                $type = $data['place_gallery']['output']['type'];

                if (!empty($val)) {
                    $logo      = Image::make($val)->encode($type);
                    Storage::disk('public')->put($gallery_image, $logo);
                }
            }

            $gallery = $this->gallery::create([
                'place_id' => $place->id,
                'image' => $gallery_image,
                'show_on_frontside' => $data['show_on_frontside']  ?? 0,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the gallery.'));
        }
        DB::commit();
        return $gallery;
    }

    public function storeHitListing(Place $place): Place
    {
        $new_visit = 0;
        if (((strtotime('1 hours', session('views'.$_SERVER['REQUEST_URI'].$_SERVER['REMOTE_ADDR']))) < time())) {
            $new_visit = 1;
        }

        session()->put('views'.$_SERVER['REQUEST_URI'].$_SERVER['REMOTE_ADDR'],time());
        if ($new_visit != 0) {
            $place->update([
                'hits' => !empty($place->hits) ? $place->hits+1 : 1,
            ]);
        }

        return $place;
    }

    public function storeReviews(array $data = [], $place): PlaceReviews
    {
        DB::beginTransaction();
        try {

            $image = "";
            if (!empty($data['image'])) {
                $image = $data['image']->store('/place_reivews', 'public');
            }

            $review = $this->reviews::create([
                'place_id' => $place->id,
                'user_id' => (Auth()->user()) ? Auth()->user()->id : null,
                'firstname' => (!Auth()->user()) ? $data['firstname'] : null,
                'lastname' => (!Auth()->user()) ? $data['lastname'] : null,
                'email' => (!Auth()->user()) ? $data['email'] : null,
                'review' => $data['review_message'],
                'image' => $image,
                // 'postcode' => (!Auth()->user()) ? $data['postcode'] : null,
                'city' => (!Auth()->user()) ? $data['city'] : null,
                'age' => (!Auth()->user()) ? $data['age'] : null,
                'start_date_of' => $data['start_date_of'] ?? null,
                'until_date' => $data['until_date'] ?? null,

            ]);

            if(!empty($data['review'])) {
                foreach ($data['review'] as $review_criteria_id => $review_rating) {
                    $this->reviewrating->create([
                        'review_id'=>$review->id,
                        'review_criteria_id'=>$review_criteria_id,
                        'listing_id'=>$place->id,
                        'listing_type'=>'place',
                        'rating'=>$review_rating,
                    ]);
                }
            }
            // $body = [
            //     'place_name' => $place->place_name,
            //     'firstname' => (!Auth()->user()) ? $data['first_name'] : Auth()->user()->userdetails->first_name,
            //     'lastname' => (!Auth()->user()) ? $data['last_name'] : Auth()->user()->userdetails->last_name,
            //     'email' => (!Auth()->user()) ? $data['email'] : Auth()->user()->email,
            //     'url' => route('frontend.panel.reviews.show',$review),
            // ];
            // dd($body);
            // Mail::to($place->email)->send(new CompanyReviewMail($body,$place));
        } catch (Exception $e) {
            DB::rollBack();
			dd($e->getMessage());
            throw new GeneralException(__('There was a problem submiiting the detail.'));
        }
        DB::commit();
        return $review;
    }
}

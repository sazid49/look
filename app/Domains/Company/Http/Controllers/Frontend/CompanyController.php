<?php

namespace App\Domains\Company\Http\Controllers\Frontend;

use App\Exceptions\GeneralException;
use App\Models\CMS;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use function json_decode;
use App\Models\ReviewRating;
use App\Models\ReviewCriteria;
use Illuminate\Contracts\View\View;
use App\Domains\Company\Models\News;
use App\Http\Controllers\Controller;
use App\Domains\Company\Models\Company;
use App\Domains\Company\Models\Reviews;
use Illuminate\Support\Facades\Session;
use App\Domains\Company\Models\Application;
use App\Domains\Company\Models\JobApplication;
use App\Domains\Company\Services\CompanyService;
use App\Domains\Company\Http\Requests\Frontend\StoreOffersRequest;
use App\Domains\Company\Http\Requests\Frontend\storeReviewsRequest;
use App\Domains\Company\Http\Requests\Frontend\StoreApplyJobRequest;
use App\Domains\Company\Http\Requests\Frontend\StoreContactUsRequest;

/**
 * Class CompanyController.
 */
class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    protected $CompanyService;

    /**
     * CategoryController constructor.
     *
     * @param  CompanyService  $CompanyService
     */
    public function __construct(CompanyService $CompanyService)
    {
        $this->CompanyService = $CompanyService;
    }

    /**
     * Display company information
     *
     * @param Company $company
     * @return View
     */
    public function information(Company $company): View
    {
        $this->CompanyService->storeHitListing($company);

        return view('frontend.includes.company.information',compact('company'));
    }

    /**
     * Display company gallery images
     *
     * @param Company $company
     * @return View
     */
    public function gallery(Company $company): View
    {
        if(enableTab($company,'show_gallery')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.gallery',compact('company'));
    }

    /**
     * Display company team
     *
     * @param Company $company
     * @return View
     */
    public function team(Company $company): View
    {
        if(enableTab($company,'show_team')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.team',compact('company'));
    }

    /**
     * Display company newses
     *
     * @param Company $company
     * @return View
     */
    public function news(Company $company): View
    {
        if(enableTab($company,'show_news')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.news',compact('company'));
    }

    /**
     * Display new details
     *
     * @param Company $company
     * @param News $news
     * @return View
     */
    public function newsDetail(Company $company,News $news): View
    {
        if(enableTab($company,'show_news')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.news_detail',compact('company','news'));
    }

    /**
     * @param Company $company
     * @return View
     */
    public function job(Company $company): View
    {
        if(enableTab($company,'show_jobs')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.job',compact('company'));
    }

    /**
     * Display job details
     *
     * @param Company $company
     * @param JobApplication $job
     * @return View
     */
    public function jobDetail(Company $company,JobApplication $job): View
    {
        if(enableTab($company,'show_jobs')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.job_detail',compact('company','job'));
    }

    /**
     * Display job application form
     *
     * @param Company $company
     * @param JobApplication $job
     * @return View
     */
    public function applyJob(Company $company,JobApplication $job): View
    {
        if(enableTab($company,'show_jobs')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.company.apply_job',compact('company','job'));
    }

    public function storeApplyJob(StoreApplyJobRequest $request,Company $company,Application $application,JobApplication $job)
    {
        $this->CompanyService->storeApplyJob($company,$job,$request->except('_token', '_method'));
        Session::flash('success','Your application has been submitted successfully!');
        return redirect()->route('frontend.company.job-application',$company)->withFlashSuccess(__('alerts.company.job.applied'));
    }

    public function recommendations(Company $company)
    {
        return view('frontend.company.recommendations')->withCompany($company);
    }

    public function contactUs(Company $company)
    {
        if(enableTab($company,'show_contactform')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        return view('frontend.includes.company.contact_us')->withCompany($company);
    }

    public function storeContactUs(StoreContactUsRequest $request,Company $company)
    {
        if(enableTab($company,'show_contactform')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        $this->CompanyService->storeContactUs($company,$request->except('_token', '_method'));
        return redirect()->back()->withFlashSuccess(__('alerts.company.contact_form.create'));
    }

    public function offer(Company $company)
    {
        if(enableTab($company,'show_interraction')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        //$offerfield = [];
        //dd($company->category->offerfield);
        //foreach ($company->category->offerfield as $group){
        //dd($group->offerField);
        //$offerfield[] = $group->offerField;
        //}

        //dd($offerfield);
        //$offerfield = $company->category->offerfield;

        $offerfield = $company->category->offerfield;

        return view('frontend.includes.company.offer',compact('offerfield','company'));
    }

    /**
     * @param StoreOffersRequest $request
     * @param Company $company
     * @return RedirectResponse
     * @throws GeneralException
     */
    public function storeOffers(StoreOffersRequest $request,Company $company): RedirectResponse
    {
        if(enableTab($company,'show_interraction')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        $this->CompanyService->storeOffers($company,$request->except('_token', '_method'));
        Session::flash('success',__('alerts.company.offers.create'));
        return redirect()->back();
    }

    public function register(Company $company)
    {
        if(enableTab($company,'show_register')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        $company->publications = json_decode ($company->publications);
        $aCms = CMS::query()->where('show_on_footer',1)->get();


        return view('frontend.includes.company.register', ['aCms'=>$aCms])->withCompany($company);
    }

    public function priceList(Company $company)
    {
        if(enableTab($company,'show_pricelist')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        $aCms = CMS::query()->where('show_on_footer',1)->get();

        return view('frontend.includes.company.price_list', [
            'aCms'=>$aCms
        ])->withCompany($company);
    }

    public function reviews(Company $company)
    {
        if(enableTab($company,'show_review')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        //$listing_reviews = $company->CompanyReview
            //->sortByDesc('id')
            //->paginate(10);

        $listing_reviews = Reviews::query()
            ->where('company_id',$company->id)
            ->latest()
            ->paginate(10);

        $ratingSum = $company->ReviewRating->sum('rating');
        $ratingCount = $company->ReviewRating->count();
        $rating = $ratingCount != 0 ? round($ratingSum / $ratingCount) : 0;

        $categoryId = $company->category_id;


        $check = Category::query()
            ->withCount('criteria')
            ->where('category_id', $categoryId)
            ->first();
            // dd($check->criteria_count);

        $defaultValue = ReviewCriteria::query()->take(4)->get();
        $check->criteria_count >= 1 ? $reviewCriterias = $check->criteria : $reviewCriterias = $defaultValue;

        return view('frontend.includes.company.reviews', [
            'rating' => $rating,
            'ratingCount' => $ratingCount,
            'reviews' => $listing_reviews,
            'reviewCriterias'=>$reviewCriterias
        ])->withCompany($company);
    }

    public function storeReviews(storeReviewsRequest $request,Company $company)
    {
        if(enableTab($company,'show_review')){
            abort(403,'This tab is disabled. Please contact with Lookon admin.');
        }

        $company = $this->CompanyService->storeReviews($company,$request->except('_token', '_method'));

        Session::flash('success',__('alerts.company.review.create'));
        return redirect()->back();
    }

}

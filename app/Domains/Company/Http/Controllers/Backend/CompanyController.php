<?php

namespace App\Domains\Company\Http\Controllers\Backend;

use App\Domains\Company\Http\Requests\Backend\EditCompanyGalleryRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyJobPageRequest;
use App\Domains\Company\Models\CompanyTabs;
use App\Domains\Company\Models\Payment;
use App\Http\Controllers\Controller;
use App\Domains\Company\Models\Company;
use App\Domains\Company\Services\CompanyService;
use App\Domains\Company\Http\Requests\Backend\EditCompanyRequest;
use App\Domains\Company\Http\Requests\Backend\StoreCompanyRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyRequest;
use App\Domains\Auth\Models\User;
use App\Domains\Company\Http\Requests\Backend\StoreCompanyGalleryRequest;
use App\Domains\Company\Http\Requests\Backend\StoreCompanyJobRequest;
use App\Domains\Company\Http\Requests\Backend\StoreCompanyNewsRequest;
use App\Domains\Company\Http\Requests\Backend\StoreCompanySeoRequest;
use App\Domains\Company\Http\Requests\Backend\StoreCompanyTeamRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyFinancePublishRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyGalleryPageRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyJobRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyNewsRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyPriceListRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyRecommendationsRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanySeoRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyTeamRequest;
use App\Domains\Company\Http\Requests\Backend\UpdateCompanyTeamPageRequest;
use App\Domains\Company\Models\Gallery;
use App\Domains\Company\Models\JobApplication;
use App\Domains\Company\Models\News;
use App\Domains\Company\Models\Team;
use App\Domains\Company\Models\Seo;
use App\Domains\Company\Models\CompanyText;
use App\Models\CantonData;
use App\Models\Category;
use App\Models\Tags;
use App\Services\Openhours;
use App\Slim\Slim;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Storage;
use Throwable;

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
     * @return Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.company.index');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function new()
    {
        return view('backend.company.new');
    }

    /**
     * Display company create page
     *
     * @return View
     */
    public function create(): View
    {
        $role = Auth()->user()->roles[0]->name;
        $category = Category::query()
            ->where('language',app()->getLocale())
            ->orderBy('category_id')
            ->get();
        $cantonData = CantonData::query()->get();
        $tags = Tags::query()->get();
        $allUsers1 = User::query()->whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();

        $timeIntervals = [
            '00:00:00','00:15:00','00:30:00','00:45:00',
            '01:00:00','01:15:00','01:30:00','01:45:00',
            '02:00:00','01:15:00','02:30:00','02:45:00',
            '03:00:00','03:15:00','03:30:00','03:45:00',
            '04:00:00','03:15:00','04:30:00','04:45:00',
            '05:00:00','05:15:00','05:30:00','05:45:00',
            '06:00:00','06:15:00','06:30:00','06:45:00',
            '07:00:00','07:15:00','07:30:00','07:45:00',
            '08:00:00','08:15:00','08:30:00','08:45:00',
            '09:00:00','09:15:00','09:30:00','09:45:00',
            '10:00:00','10:15:00','10:30:00','10:45:00',
            '11:00:00','11:15:00','11:30:00','11:45:00',
            '12:00:00','12:15:00','12:30:00','12:45:00',
            '13:00:00','13:15:00','13:30:00','13:45:00',
            '14:00:00','14:15:00','14:30:00','14:45:00',
            '15:00:00','15:15:00','15:30:00','15:45:00',
            '16:00:00','16:15:00','16:30:00','16:45:00',
            '17:00:00','17:15:00','17:30:00','17:45:00',
            '18:00:00','18:15:00','18:30:00','18:45:00',
            '19:00:00','19:15:00','19:30:00','19:45:00',
            '20:00:00','20:15:00','20:30:00','20:45:00',
            '21:00:00','21:15:00','21:30:00','21:45:00',
            '22:00:00','22:15:00','22:30:00','22:45:00',
            '23:00:00','23:15:00','23:30:00','23:45:00',
        ];

        return view('backend.company.create',compact('timeIntervals','category','tags','role','cantonData','allUsers1'));
    }

    public function store(StoreCompanyRequest $request)  
    {
        $company = $this->CompanyService->store($request->except('_token', '_method'));
        return redirect()->route('admin.company.information',$company)->withFlashSuccess(__('alerts.company.create'));
    }

//    public function edit(EditCompanyRequest $request, Company $company)
//    {
//        $role = Auth()->user()->roles[0]->name;
//        $category = Category::get();
//        $cantonData = CantonData::get();
//        $tags = Tags::get();
//        $allUsers1 = User::whereHas('roles', function($q){
//            $q->WhereNotIn('id',[3]);
//        })->get();
//
//        $open_hours_select =  [
//            'selects' => Openhours::getOpeningHoursSelect($company->opening_hours ?? []),
//            'days_of_week' => Openhours::$days_of_week
//        ];
//
//        return view('backend.company.edit',['open_hours_select'=>$open_hours_select])
//            ->withCompany($company)
//            ->withCategory($category)
//            ->withCantonData($cantonData)
//            ->withTags($tags)
//            ->withRole($role)
//            ->withAllUsers1($allUsers1);
//    }

    /**
     * @param  UpdateCompanyRequest  $request
     * @param  Company  $company
     *
     * @return mixed
     * @throws Throwable
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->CompanyService->update($company, $request->except('_token', '_method'));

        return redirect()->route('admin.company.edit', $company)->withFlashSuccess(__('alerts.company.update'));
    }

    /**
     * @param  UpdateCompanyFinancePublishRequest  $request
     * @param  Company  $company
     *
     * @return mixed
     * @throws Throwable
     */
    public function updateFinancePublish(UpdateCompanyFinancePublishRequest $request, Company $company)
    {
        $this->CompanyService->updateFinancePublish($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess("Company updated successfully");
    }


    public function information(Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $category = Category::query()
            ->where('language',app()->getLocale())
            ->orderBy('category_id')
            ->get();
        $cantonData = CantonData::query()
            ->where('language',app()->getLocale())
            ->orderBy('iso')
            ->get();
        $tags = Tags::query()->get();
//		$allUsers1 = User::query()->whereHas('roles', function($q){
//				$q->WhereNotIn('id',[3]);
//			})->get();
        $allUsers1 = User::query()->get();

        $open_hours_select =  [
            'selects' => Openhours::getOpeningHoursSelect($company->opening_hours ?? []),
            'days_of_week' => Openhours::$days_of_week
        ];

        $timeIntervals = [
            '00:00:00','00:15:00','00:30:00','00:45:00',
            '01:00:00','01:15:00','01:30:00','01:45:00',
            '02:00:00','01:15:00','02:30:00','02:45:00',
            '03:00:00','03:15:00','03:30:00','03:45:00',
            '04:00:00','03:15:00','04:30:00','04:45:00',
            '05:00:00','05:15:00','05:30:00','05:45:00',
            '06:00:00','06:15:00','06:30:00','06:45:00',
            '07:00:00','07:15:00','07:30:00','07:45:00',
            '08:00:00','08:15:00','08:30:00','08:45:00',
            '09:00:00','09:15:00','09:30:00','09:45:00',
            '10:00:00','10:15:00','10:30:00','10:45:00',
            '11:00:00','11:15:00','11:30:00','11:45:00',
            '12:00:00','12:15:00','12:30:00','12:45:00',
            '13:00:00','13:15:00','13:30:00','13:45:00',
            '14:00:00','14:15:00','14:30:00','14:45:00',
            '15:00:00','15:15:00','15:30:00','15:45:00',
            '16:00:00','16:15:00','16:30:00','16:45:00',
            '17:00:00','17:15:00','17:30:00','17:45:00',
            '18:00:00','18:15:00','18:30:00','18:45:00',
            '19:00:00','19:15:00','19:30:00','19:45:00',
            '20:00:00','20:15:00','20:30:00','20:45:00',
            '21:00:00','21:15:00','21:30:00','21:45:00',
            '22:00:00','22:15:00','22:30:00','22:45:00',
            '23:00:00','23:15:00','23:30:00','23:45:00',
        ];

        //$day_of_week = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];

        return view('backend.company.information',['open_hours_select'=>$open_hours_select,'timeIntervals'=>$timeIntervals])
            ->withCompany($company)
            ->withTags($tags)
            ->withCategory($category)
            ->withCantonData($cantonData)
            ->withRole($role)
            ->withAllUsers1($allUsers1);

    }

    public function updateInformation(UpdateCompanyRequest $request, Company $company)
    {
        $this->CompanyService->updateInformation($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.company.information.update'));
    }


    public function register(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.register')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateRegister(UpdateCompanyFinancePublishRequest $request, Company $company)
    {
        $this->CompanyService->updateRegister($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.company.register.update'));
    }

    public function interaction(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.interaction')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateInteraction(UpdateCompanyFinancePublishRequest $request, Company $company)
    {
        $this->CompanyService->updateInteraction($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.company.interaction.update'));
    }


    public function review(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.review')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateReview(UpdateCompanyFinancePublishRequest $request, Company $company)
    {
        $this->CompanyService->updateReview($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.company.review.update'));
    }


    public function contactForm(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.contact_form')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateContactForm(UpdateCompanyFinancePublishRequest $request, Company $company)
    {
        $this->CompanyService->updateContactForm($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.company.contact_form.update'));
    }

    public function recommendations(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::query()->whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.recommendations')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateRecommendations(UpdateCompanyRecommendationsRequest $request, Company $company)
    {
        $this->CompanyService->updateRecommendations($company, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.company.recommendations.update'));
    }


    public function pricelist(Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.pricelist')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updatePriceList(UpdateCompanyPriceListRequest $request, Company $company)
    {
        $this->CompanyService->updatePriceList($company, $request->except('_token', '_method'));
        return redirect()->back()->withFlashSuccess(__('alerts.company.price_list.update'));
    }


//    public function updateTeamPage(UpdateCompanyTeamPageRequest $request, Company $company, Seo $seo)
//    {
//        $this->CompanyService->updateTeamPage($seo,$request->except('_token', '_method'),$company);
//        return redirect()->route('admin.company.team.index',$company)->withFlashSuccess(__('alerts.company.team.update'));
//    }

    public function team(Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.team')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function storeTeam(StoreCompanyTeamRequest $request, Company $company)
    {
        $this->CompanyService->storeTeam($company,$request->except('_token', '_method'));
        return redirect()->route('admin.company.team.index',$company)->withFlashSuccess(__('alerts.company.team.create'));
    }

    public function editTeam(EditCompanyRequest $request, Company $company, Team $team)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();
        return view('backend.company.edit_team')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1)
            ->withTeam($team);
    }

    public function updateTeam(UpdateCompanyTeamRequest $request, Company $company, Team $team)
    {
        $this->CompanyService->updateTeam($team,$request->except('_token', '_method'),$company);
        return redirect()->route('admin.company.team.index',$company)->withFlashSuccess(__('alerts.company.team.update'));
    }

    public function destroyTeam(Company $company, Team $team)
    {
        if (Storage::disk('public')->exists($team['profile_photo'])) {
            Storage::disk('public')->delete($team['profile_photo']);
        }
        $team->delete();
        return redirect()->route('admin.company.team.index',$company)->withFlashSuccess(__('alerts.company.team.delete'));
    }

    public function showTeam(EditCompanyRequest $request, Company $company, Team $team)
    {
        return view('backend.company.show_team')
            ->withCompany($company)
            ->withTeam($team);
    }

    public function news(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();

        return view('backend.company.news')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function storeNews(StoreCompanyNewsRequest $request, Company $company)
    {
        $this->CompanyService->storeNews($company, $request->except('_token', '_method'));
        return redirect()->route('admin.company.news.index',$company)->withFlashSuccess(__('alerts.company.news.create'));
    }

    public function editNews(EditCompanyRequest $request, Company $company, News $news)
    {
        return view('backend.company.edit_news')
            ->withCompany($company)
            ->withNews($news);
    }

    public function updateNews(UpdateCompanyNewsRequest $request, Company $company, News $news)
    {
        $this->CompanyService->updateNews($news,$request->except('_token', '_method'));
        return redirect()->route('admin.company.news.index',$company)->withFlashSuccess(__('alerts.company.news.update'));
    }

    public function showNews(EditCompanyRequest $request, Company $company, News $news)
    {
        return view('backend.company.show_news')
            ->withCompany($company)
            ->withNews($news);
    }

    public function destroyNews(Company $company, News $news)
    {
        if (Storage::disk('public')->exists($news['picture'])) {
            Storage::disk('public')->delete($news['picture']);
        }
        $news->delete();

        return redirect()->route('admin.company.news.index',$company)->withFlashSuccess(__('alerts.company.news.delete'));
    }


    public function gallery(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();

        return view('backend.company.gallery')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function storeGallery(StoreCompanyGalleryRequest $request, Company $company)
    {
        $this->CompanyService->storeGallery($request->except('_token', '_method'),$company);
        return redirect()->route('admin.company.gallery.index',$company)->withFlashSuccess(__('alerts.company.gallery.create'));
    }

    public function editGallery(EditCompanyGalleryRequest $request, Company $company, Gallery $gallery)
    {
        return view('backend.company.edit_gallery')
            ->withCompany($company)
            ->withGallery($gallery);
    }

    public function updateGallery(StoreCompanyGalleryRequest $request,Company $company, Gallery $gallery)
    {
        //todo:: update the gallery image
        $this->CompanyService->updateGallery($company,$request->except('_token', '_method'));
        return redirect()->route('admin.company.gallery.index',$company)->withFlashSuccess(__('alerts.company.gallery.update'));
    }

    public function destroyGallery(Company $company, Gallery $gallery) {
        if (Storage::disk('public')->exists($gallery['image'])) {
            Storage::disk('public')->delete($gallery['image']);
        }

        $gallery->delete();
        return redirect()->route('admin.company.gallery.index',$company)->withFlashSuccess(__('alerts.company.gallery.delete'));
    }

    public function updateGalleryPage(UpdateCompanyGalleryPageRequest $request, Company $company)
    {
        $this->CompanyService->updateGalleryPage($company,$request->except('_token', '_method'));

        return redirect()->route('admin.company.gallery.index',$company)->withFlashSuccess(__('alerts.company.gallery.update'));
    }

    public function job(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();

        return view('backend.company.job')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function storeJob(StoreCompanyJobRequest $request, Company $company)
    {
        $this->CompanyService->storeJob($company,$request->except('_token', '_method'));
        return redirect()->route('admin.company.job_application.index',$company)->withFlashSuccess(__('alerts.company.job.create'));
    }

    public function editJob(EditCompanyRequest $request, Company $company, JobApplication $job)
    {
        return view('backend.company.edit_job')
            ->withCompany($company)
            ->withJob($job);
    }

    public function updateJob(UpdateCompanyJobRequest $request, Company $company, JobApplication $job)
    {
        $this->CompanyService->updateJob($job,$request->except('_token', '_method'));
        return redirect()->route('admin.company.job_application.index',$company)->withFlashSuccess(__('alerts.company.job.update'));
    }

    public function showJob(EditCompanyRequest $request, Company $company, JobApplication $job)
    {
        return view('backend.company.show_job')
            ->withCompany($company)
            ->withJob($job);
    }

    public function destroyJob(Company $company, JobApplication $job)
    {
        $job->delete();
        return redirect()->route('admin.company.job_application.index',$company)->withFlashSuccess(__('alerts.company.job.delete'));
    }

    public function updateJobPage(UpdateCompanyJobPageRequest $request, Company $company)
    {
        $this->CompanyService->updateJobPage($company,$request->except('_token', '_method'));

        return redirect()->route('admin.company.job_application.index',$company)->withFlashSuccess(__('alerts.company.job.update'));
    }

    public function editSeo(EditCompanyRequest $request, Company $company)
    {
        $role = Auth()->user()->roles[0]->name;
        $allUsers1 = User::query()->whereHas('roles', function($q){
            $q->WhereNotIn('id',[3]);
        })->get();

        //$seo = Seo::query()->where('company_id',$company->id)->get();
        //dd($seo);

        return view('backend.company.seo')
            ->withCompany($company)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateSeo(UpdateCompanySeoRequest $request, Company $company, Payment $payment, Seo $seo)
    {
        $this->CompanyService->updateSeo($seo,$company,$payment,$request->except('_token', '_method'));
        return redirect()->route('admin.company.seo',$company)->withFlashSuccess(__('alerts.company.seo.update'));
    }










    // public function storeSeo(StoreCompanySeoRequest $request, Company $company)
    // {
    // 	$this->CompanyService->storeSeo($request->except('_token', '_method'),$company);
    // 	return redirect()->route('admin.company.edit',$company)->withFlashSuccess("Seo created successfully");
    // }

    // public function editSeo(EditCompanyRequest $request, Company $company, Seo $seo)
    // {
    // 	return view('backend.company.edit_seo')
    // 				->withCompany($company)
    // 				->withSeo($seo);
    // }

    // public function destroySeo(Company $company, Seo $seo)
    // {
    // 	$seo->delete();
    // 	return redirect()->route('admin.company.edit',$company)->withFlashSuccess('Seo deleted successfully.');
    // }


    /**
     * @param  Company  $company
     *
     * @return mixed
     * @throws Exception
     */
    public function destroy(Company $company)
    {
        $this->CompanyService->destroy($company);

        return redirect()->route('admin.company.index')->withFlashSuccess(__('alerts.company.delete'));
    }

    /**
     * Update company payer information via ajax
     *
     * @param Request $request
     * @param $id
     * @return View
     */
    public function updatePayment(Request $request, Company $company): View
    {
        //$company = Company::query()->findOrFail($id);

        $validator = Validator::make($request->all(),[
            'payer' => 'required',
            'not_payer_reason' => 'required',
            'price_contract' => 'required',
            'price_actual' => 'required'
        ]);

        if ($validator->fails()) {
            return view('backend.company.includes.finance',compact('company'))
                ->withErrors($validator);
        }

        $payment = $company->payment;


        try {
            if($payment){
                $payment->update($request->all());
            }else{
                Payment::query()->create([
                    'transaction_id' => rand(10000,99999),
                    'company_id' => $company->id,
                    'payment_method' => 'Cash',
                    'detail' => 'lorem ipsum dolor sumit detail',
                    'raw_data' => 'lorem raw data ipsum dolor sumit',
                    'payer' => $request->payer,
                    'not_payer_reason' => $request->not_payer_reason,
                    'price_contract' => $request->price_contract,
                    'price_actual' => $request->price_actual
                ]);
            }
        }catch (Exception $e){
            dd($e);
        }

        Session::now('success','Payer information updated!');

        return view('backend.company.includes.finance',compact('company'));
    }

    public function updateListing(Request $request,Company $company)
    {
        $field = $request->get('field');
        $value = $request->get('v') == 'true' ? 1 : 0;
        $company->update([$field=>$value]);
        return response(['status'=>'success','msg'=>$field.' status has been changed!']);
    }

    public function updateClaim(Request $request, Company $company)
    {
        if($request->get('claimedBy')){
            $claims = [
                'claimed' => 1,
                'claimed_by' => $request->get('claimedBy'),
                'claimed_on' => now(),
            ];
            $msg = 'Company has been claimed.';
        }else{
            $claims = [
                'claimed' => 0,
                'claimed_by' => null,
                'claimed_on' => null,
            ];
            $msg = 'Claim removed!';
        }
        $company->update($claims);
        return response(['status'=>'success','msg'=>$msg]);
    }

    public function updateShowTab(Request $request, Company $company)
    {
        $tab = $company->companytabs;

        if($tab == null){
            CompanyTabs::query()->create([
                'company_id' => $company->id,
                'show_register' => 0,
                'show_interraction' => 0,
                'show_contactform' => 0,
                //'show_review' => null,
                'show_pricelist' => 0,
                'show_team' => 0,
                'show_news' => 0,
                'show_gallery' => 0,
                'show_jobs' => 0,
                'show_review' => 0,
            ]);

            $tab = $company->companytabs;
        }

        $checked = $request->get('v');
        $field = $request->get('field');

        if($checked == 'true'){
            $tab->update([$field=>1]);
            $msg = 'The '.$field.' is visible now!';
        }else{
            $tab->update([$field=>0]);
            $msg = 'The '.$field.' is hidden!';
        }

        return $msg;
    }

    /**
     * Update company thumbnail using slim/ajax
     *
     * @param Request $request
     * @param Company $company
     * @return array
     */
    public function updateThumbnail(Request $request, Company $company)
    {
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
        }

        // get the crop data for the output image
        $data = $image['output']['data'];

        // If you want to store the file in another directory pass the directory name as the third parameter.
        $output = Slim::saveFile($data, $name, '../storage/app/public/company_thumbnail/'.$company->id.'/',false);

        $pathNFile = 'company_thumbnail/'.$company->id.'/'.$name;

        $company->update(['thumbnail'=>$pathNFile]);

        return $output;
    }

    /**
     * Update company logo using slim/ajax
     *
     * @param Request $request
     * @param Company $company
     * @return array
     */
    public function updateLogo(Request $request, Company $company): array
    {
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
        }

        // get the crop data for the output image
        $data = $image['output']['data'];

        // If you want to store the file in another directory pass the directory name as the third parameter.
        $output = Slim::saveFile($data, $name, '../storage/app/public/company_logo/'.$company->id.'/',false);

        $pathNFile = 'company_logo/'.$company->id.'/'.$name;

        $company->update(['logo'=>$pathNFile]);

        return $output;
    }

}

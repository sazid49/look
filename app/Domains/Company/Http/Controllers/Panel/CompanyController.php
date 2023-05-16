<?php

namespace App\Domains\Company\Http\Controllers\Panel;

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
use App\Models\CantonData;
use App\Models\Category;
use App\Models\Tags;
use App\Services\Openhours;
use Storage;

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
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('frontend.panel.company.index');
	}

	// /**
	//  * @return mixed
	//  */
	// public function create()
	// {
	// 	$role = Auth()->user()->roles[0]->name;
	// 	$category = Category::get();
	// 	$allUsers1 = User::whereHas('roles', function($q){
	// 			$q->WhereNotIn('id',[2,3]);
	// 		})->get();

	// 	$open_hours_select =  [
	// 		'selects' => Openhours::getOpeningHoursSelect([]),
	// 		'days_of_week' => Openhours::$days_of_week
	// 	];

	// 	return view('frontend.panel.company.create',['open_hours_select'=>$open_hours_select])->withCategory($category)->withRole($role)->withAllUsers1($allUsers1);
	// }

	// public function store(StoreCompanyRequest $request)
	// {
	// 	$company = $this->CompanyService->store($request->except('_token', '_method'));
	// 	return redirect()->route('frontend.panel.company.information',$company)->withFlashSuccess(__('alerts.company.create'));
	// }

	// public function edit(EditCompanyRequest $request, Company $company)
	// {
	// 	$role = Auth()->user()->roles[0]->name;
	// 	$category = Category::get();
	// 	$allUsers1 = User::whereHas('roles', function($q){
	// 			$q->WhereNotIn('id',[2,3]);
	// 		})->get();

	// 	$open_hours_select =  [
	// 		'selects' => Openhours::getOpeningHoursSelect($company->opening_hours ?? []),
	// 		'days_of_week' => Openhours::$days_of_week
	// 	];

	// 	return view('backend.company.edit',['open_hours_select'=>$open_hours_select])
	// 				->withCompany($company)
	// 				->withCategory($category)
	// 				->withRole($role)
	// 				->withAllUsers1($allUsers1);
	// }

	// /**
	//  * @param  UpdateCompanyRequest  $request
	//  * @param  Company  $company
	//  *
	//  * @return mixed
	//  * @throws \Throwable
	//  */
	// public function update(UpdateCompanyRequest $request, Company $company)
	// {
	// 	$this->CompanyService->update($company, $request->except('_token', '_method'));

	// 	return redirect()->route('admin.company.edit', $company)->withFlashSuccess(__('alerts.company.update'));
	// }

	/**
	 * @param  UpdateCompanyFinancePublishRequest  $request
	 * @param  Company  $company
	 *
	 * @return mixed
	 * @throws \Throwable
	 */
	public function updateFinancePublish(UpdateCompanyFinancePublishRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateFinancePublish($company, $request->except('_token', '_method'));

		return redirect()->back()->withFlashSuccess("Company updated successfully");
	}


	public function information(EditCompanyRequest $request, Company $company)
	{
		$role = Auth()->user()->roles[0]->name;
		$cantonData = CantonData::get();
		$category = Category::get();
		$tags = Tags::get();
		$allUsers1 = User::whereHas('roles', function($q){
				$q->WhereNotIn('id',[2,3]);
			})->get();

		$open_hours_select =  [
			'selects' => Openhours::getOpeningHoursSelect($company->opening_hours ?? []),
			'days_of_week' => Openhours::$days_of_week
		];

		return view('frontend.panel.company.information',['open_hours_select'=>$open_hours_select])
					->withCompany($company)
					->withTags($tags)
					->withCantonData($cantonData)
					->withCategory($category)
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
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.register')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateRegister(UpdateCompanyFinancePublishRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateRegister($company, $request->except('_token', '_method'));

		return redirect()->back()->withFlashSuccess(__('alerts.company.register.update'));
	}

	public function interaction(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.interaction')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateInteraction(UpdateCompanyFinancePublishRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateInteraction($company, $request->except('_token', '_method'));

		return redirect()->back()->withFlashSuccess(__('alerts.company.interaction.update'));
	}

	public function review(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.review')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateReview(UpdateCompanyFinancePublishRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateReview($company, $request->except('_token', '_method'));

		return redirect()->back()->withFlashSuccess(__('alerts.company.review.update'));
	}

	public function contactForm(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.contact_form')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateContactForm(UpdateCompanyFinancePublishRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateContactForm($company, $request->except('_token', '_method'));
		return redirect()->back()->withFlashSuccess(__('alerts.company.contact_form.update'));
	}

	public function recommendations(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.recommendations')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateRecommendations(UpdateCompanyRecommendationsRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateRecommendations($company, $request->except('_token', '_method'));
		return redirect()->back()->withFlashSuccess(__('alerts.company.recommendations.update'));
	}

	public function pricelist(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.pricelist')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updatePriceList(UpdateCompanyPriceListRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updatePriceList($company, $request->except('_token', '_method'));
		return redirect()->back()->withFlashSuccess(__('alerts.company.price_list.update'));
	}

	public function team(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.team')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateTeamPage(UpdateCompanyTeamPageRequest $request, Company $company, Seo $seo)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateTeamPage($seo,$request->except('_token', '_method'),$company);
		return redirect()->back()->withFlashSuccess(__('alerts.company.team.update'));
	}

	public function storeTeam(StoreCompanyTeamRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->storeTeam($request->except('_token', '_method'),$company);
		return redirect()->back()->withFlashSuccess(__('alerts.company.team.create'));
	}

	public function editTeam(EditCompanyRequest $request, Company $company, Team $team)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();
		return view('frontend.panel.company.edit_team')
					->withCompany($company)
					->withRole($role)
					->withTeam($team)
					->withAllUsers1($allUsers1);

	}

	public function showTeam(EditCompanyRequest $request, Company $company, Team $team)
	{
		return view('frontend.panel.company.show_team')
					->withCompany($company)
					->withTeam($team);
	}

	public function updateTeam(UpdateCompanyTeamRequest $request, Company $company, Team $team)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateTeam($team,$request->except('_token', '_method'),$company);
		return redirect()->route('frontend.panel.company.team.index',$company)->withFlashSuccess(__('alerts.company.team.update'));
	}

	public function destroyTeam(Company $company, Team $team)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		if (Storage::disk('public')->exists($team['profile_photo'])) {
			Storage::disk('public')->delete($team['profile_photo']);
		}
		$team->delete();
		return redirect()->back()->withFlashSuccess(__('alerts.company.team.delete'));
	}

	public function news(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();

		return view('frontend.panel.company.news')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function storeNews(StoreCompanyNewsRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->storeNews($request->except('_token', '_method'),$company);
		return redirect()->back()->withFlashSuccess(__('alerts.company.news.create'));
	}

	public function editNews(EditCompanyRequest $request, Company $company, News $news)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		return view('frontend.panel.company.edit_news')
					->withCompany($company)
					->withNews($news);
	}

	public function updateNews(UpdateCompanyNewsRequest $request, Company $company, News $news)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateNews($news,$request->except('_token', '_method'));
		return redirect()->back()->withFlashSuccess(__('alerts.company.news.update'));
	}

	public function showNews(EditCompanyRequest $request, Company $company, News $news)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		return view('frontend.panel.company.show_news')
					->withCompany($company)
					->withNews($news);
	}

	public function destroyNews(Company $company, News $news)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		if (Storage::disk('public')->exists($news['picture'])) {
			Storage::disk('public')->delete($news['picture']);
		}
		$news->delete();

		return redirect()->back()->withFlashSuccess(__('alerts.company.news.delete'));
	}

	public function gallery(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();

		return view('frontend.panel.company.gallery')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateGalleryPage(UpdateCompanyGalleryPageRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateGalleryPage($company,$request->except('_token', '_method'));

		return redirect()->back()->withFlashSuccess(__('alerts.company.gallery.update'));
	}

	public function storeGallery(StoreCompanyGalleryRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->storeGallery($request->except('_token', '_method'),$company);
		return redirect()->back()->withFlashSuccess(__('alerts.company.gallery.create'));
	}

	public function destroyGallery(Company $company, Gallery $gallery) {
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		if (Storage::disk('public')->exists($gallery['image'])) {
			Storage::disk('public')->delete($gallery['image']);
		}

		$gallery->delete();
		return redirect()->back()->withFlashSuccess(__('alerts.company.gallery.delete'));
	}

	public function job(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();

		return view('frontend.panel.company.job')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function storeJob(StoreCompanyJobRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->storeJob($request->except('_token', '_method'),$company);
		return redirect()->back()->withFlashSuccess(__('alerts.company.job.create'));
	}

	public function editJob(EditCompanyRequest $request, Company $company, JobApplication $job)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		return view('frontend.panel.company.edit_job')
					->withCompany($company)
					->withJob($job);
	}

	public function updateJob(UpdateCompanyJobRequest $request, Company $company, JobApplication $job)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateJob($job,$request->except('_token', '_method'));
		return redirect()->back()->withFlashSuccess(__('alerts.company.job.update'));
	}

	public function showJob(EditCompanyRequest $request, Company $company, JobApplication $job)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		return view('frontend.panel.company.show_job')
					->withCompany($company)
					->withJob($job);
	}

	public function destroyJob(Company $company, JobApplication $job)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$job->delete();
		return redirect()->back()->withFlashSuccess(__('alerts.company.job.delete'));
	}

	public function editSeo(EditCompanyRequest $request, Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$role = Auth()->user()->roles[0]->name;
		$allUsers1 = User::whereHas('roles', function($q){
			$q->WhereNotIn('id',[2,3]);
		})->get();

		return view('frontend.panel.company.seo')
					->withCompany($company)
					->withRole($role)
					->withAllUsers1($allUsers1);
	}

	public function updateSeo(UpdateCompanySeoRequest $request, Company $company, Seo $seo)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->updateSeo($seo,$request->except('_token', '_method'),$company);
		return redirect()->back()->withFlashSuccess(__('alerts.company.seo.update'));
	}

	/**
	 * @param  Company  $company
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function destroy(Company $company)
	{
		if($company->payer != "1") {
			return redirect()->route('frontend.panel.company.information',$company);
		}

		$this->CompanyService->destroy($company);

		return redirect()->back()->withFlashSuccess(__('alerts.company.delete'));
	}
}

<?php

namespace App\Http\Controllers\Panel;

use App\Domains\Company\Models\Reviews;
use App\Domains\Company\Services\CompanyService;
use App\Http\Requests\Panel\Review\ReplyReviewRequest;
use DB;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ReviewController.
 */
class ReviewController
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
	public function index(Request $request)
	{	
		return view('frontend.panel.review.index');
	}

	public function show(Reviews $review)
	{
		return view('frontend.panel.review.show')
			->withReview($review);
	}

	public function replay(ReplyReviewRequest $request,Reviews $review) {
		$this->CompanyService->storeReplay($request->except('_token', '_method'),$review);
		return redirect()->back()->withFlashSuccess(__('alerts.company.review.replay'));
	}

	public function destroy(Reviews $review)
	{
		DB::beginTransaction();
		try {
			$review->ReviewRating->each->delete();
			$review->delete();
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('frontend.panel.contactus.index')->withFlashDanger(__('alerts.contactus.delete_error'));
		}
		DB::commit();
		return redirect()->route('frontend.panel.contactus.index')->withFlashSuccess(__('alerts.contactus.delete'));
	}
}

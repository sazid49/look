<?php

namespace App\Http\Controllers\Panel;

use App\Domains\Company\Models\Offers;
use DB;
use Exception;
use Illuminate\Http\Request;

/**
 * Class OfferController.
 */
class OfferController
{
	// /**
	//  * @var OfferFieldService
	//  */
	// protected $offerFieldService;

	// /**
	//  * CategoryController constructor.
	//  *
	//  * @param  OfferFieldService  $offerFieldService
	//  */
	// public function __construct(OfferFieldService $offerFieldService)
	// {
	// 	$this->offerFieldService = $offerFieldService;
	// }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{	
		return view('frontend.panel.offers.index');
	}

	public function show(Offers $offer)
	{
		return view('frontend.panel.offers.show')
			->withOffer($offer);
	}

	public function destroy(Offers $offer)
	{
		DB::beginTransaction();
		try {
			foreach ($offer->offerfieldanswer as $key => $offerfieldanswer) {
				$offerfieldanswer->delete();
			}
			$offer->delete();
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('frontend.panel.offers.index')->withFlashDanger(__('alerts.offers.delete_error'));
		}
		DB::commit();
		return redirect()->route('frontend.panel.offers.index')->withFlashSuccess(__('alerts.offers.delete'));
	}
}

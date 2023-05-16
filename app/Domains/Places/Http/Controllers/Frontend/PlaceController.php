<?php

namespace App\Domains\Places\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Domains\Places\Models\Place;
use App\Domains\Places\Services\PlaceService;
use App\Services\Openhours;
use DateTimeImmutable;
use Illuminate\Http\Client\Request;
use Image;
use Carbon\Carbon;
use App\Domains\Places\Http\Requests\Frontend\storeReviewsRequest;
/**
 * Class PlaceController.
 */
class PlaceController extends Controller
{
	/**
	 * @var PlaceService
	 */
	protected $PlaceService;

	/**
	 * CategoryController constructor.
	 *
	 * @param  PlaceService  $PlaceService
	 */
	public function __construct(PlaceService $PlaceService)
	{
		$this->PlaceService = $PlaceService;
	}

	public function information(Place $place)
	{   
		
		$open_hours_select =  [];
		$spatieOpenHours =  [];
		$is_open =  [];
		$openHoursDisplayArray =  [];
		$this->opening_hours = $place->opening_hours;
		if ($place->opening_hours) {
			$open_hours_select =  [
				'selects' => Openhours::getOpeningHoursSelect($place->opening_hours ?? []),
				'days_of_week' => Openhours::$days_of_week,
			];
			$spatieOpenHours = Openhours::getOpenHours($place->opening_hours ?? []);
			$is_open = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;
			$openHoursDisplayArray = $this->_buildOpenHoursDisplayArray();
		}

		$this->PlaceService->storeHitListing($place);

		return view('frontend.places.information', [
			'is_open' => $is_open,
			'open_hours_select' => $open_hours_select,
			'openHoursDisplayArray' => $openHoursDisplayArray,
			'opening_hours' => $place->opening_hours
		])->withPlace($place);
	}

	public function gallery(Place $place)
	{
		
		if($place->active == 0 || $place->published == 0) {
			return redirect()->route('frontend.places.information',$place);
		} 

		$open_hours_select =  [];
		$spatieOpenHours =  [];
		$is_open =  [];
		$openHoursDisplayArray =  [];
		$this->opening_hours = $place->opening_hours;
		if ($place->opening_hours) {
			$open_hours_select =  [
				'selects' => Openhours::getOpeningHoursSelect($place->opening_hours ?? []),
				'days_of_week' => Openhours::$days_of_week,
			];
			$spatieOpenHours = Openhours::getOpenHours($place->opening_hours ?? []);
			$is_open = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;
			$openHoursDisplayArray = $this->_buildOpenHoursDisplayArray();
		}

		return view('frontend.places.gallery', [
			'is_open' => $is_open,
			'open_hours_select' => $open_hours_select,
			'openHoursDisplayArray' => $openHoursDisplayArray,
			'opening_hours' => $place->opening_hours
		])
			->withPlace($place);
	}

	private function _buildOpenHoursDisplayArray()
	{
		$now = new DateTimeImmutable('now');
		//$openhours = Openhours::getOpenHours (json_`encode ( $opening_hours) );
		//$current_time = strtotime( date('H:i') );
		$today = lcfirst(date('l'));
		$yesterday =  lcfirst(date('l', strtotime('yesterday')));

		$open_hours = [];

		$spatieOpenHours = Openhours::getOpenHours($this->opening_hours);

		$days_of_week = Openhours::$days_of_week;
		//$timesOfDay = Openhours::$times_of_day;

		$is_open_from_yesterday = false;

		//$this->previous_open = $spatieOpenHours->previousOpen   (new DateTime('now'));
		//$this->previous_close = $spatieOpenHours->previousClose (new DateTime('now'));
		//$this->next_open = $spatieOpenHours->nextOpen  (new DateTime('now'));

		$this->is_open = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;

		if ($this->is_open) {
			$range = $spatieOpenHours->currentOpenRange($now);

			if ($range) {
				$start = $now->modify($range->start() . ($range->start() > $range->end() ? ' - 1 day' : ''));
				//$end = $now->modify ( $range->end () );
				$is_open_from_yesterday = $start->format('Y-m-d') < $now->format('Y-m-d');
			}
		}

		foreach ($days_of_week as $index => $iterated_day) {
			$open_hours_today = [];

			$opening_hours_today = $this->opening_hours->$iterated_day ?? false;


			$iterated_day_of_week_is_today = $today == $iterated_day;
			$iterated_day_of_week_is_yesterday = $yesterday == $iterated_day;

			if ($opening_hours_today) { //for this day of the wwek, there must be valid opening hours to even consider it.

				$has_valid_opening_hours =
					!empty($opening_hours_today->morning_from)
					&& !empty($opening_hours_today->morning_to)
					&& ($opening_hours_today->morning_from != 'closed');

				$has_valid_afternoon_hours =
					!empty($opening_hours_today->afternoon_from)
					&& !empty($opening_hours_today->afternoon_to)
					&& $opening_hours_today->afternoon_from != 'closed';

				if ($has_valid_opening_hours) {

					if ($iterated_day_of_week_is_today ||  ($iterated_day_of_week_is_yesterday && $is_open_from_yesterday)) {

						$morning_open_class = $this->_openHoursMatchesRange($opening_hours_today->morning_from, $opening_hours_today->morning_to);
					} else {
						$morning_open_class = false;
					}

					
					$open_hours_today[] = [
						'start' => Carbon::parse( $opening_hours_today->morning_from)->format('H:i'),
						'end' => Carbon::parse( $opening_hours_today->morning_to)->format('H:i'),
						'is_open' => $morning_open_class
					];
				}

				if ($has_valid_afternoon_hours) {
					if ($iterated_day_of_week_is_today || ($iterated_day_of_week_is_yesterday && $is_open_from_yesterday)) {

						$afternoon_open_class = $this->_openHoursMatchesRange($opening_hours_today->afternoon_from, $opening_hours_today->afternoon_to);
					} else {
						$afternoon_open_class = false;
					}

					

					$open_hours_today[] = [
						'start' => Carbon::parse( $opening_hours_today->afternoon_from)->format('H:i'),
						'end' => Carbon::parse( $opening_hours_today->afternoon_to)->format('H:i'),
						'is_open' => $afternoon_open_class
					];

				}

				$open_hours[$iterated_day] = [
					'has_open_hours' => true,
					'is_open' =>  $this->is_open && $iterated_day_of_week_is_today,
					'open_hours' => $open_hours_today,
					'is_today' => $iterated_day_of_week_is_today,
					'is_yesterday' => $iterated_day_of_week_is_yesterday,
					'is_open_from_yesterday' => $is_open_from_yesterday
				];
			} else { //no valid open hours, record empty array
				$open_hours[$iterated_day] = [
					'has_open_hours' => false,
					'is_open' =>  $this->is_open  && $iterated_day_of_week_is_today,
					'is_today' => $iterated_day_of_week_is_today && $iterated_day_of_week_is_today,
					'is_yesterday' => $iterated_day_of_week_is_yesterday
				];
			}
		}

		return $open_hours;
	}

	private function _openHoursMatchesRange($start, $end)
	{
		if ($spatieOpenHours = Openhours::getOpenHours($this->opening_hours)) {
			$now = new DateTimeImmutable('now');
			return ($currentOpenRangeStart = $spatieOpenHours->currentOpenRangeStart($now)) && ($currentOpenRangeStart->format('H:i') == $start)
				&&
				($currentOpenRangeEnd = $spatieOpenHours->currentOpenRangeEnd($now)) && ($currentOpenRangeEnd->format('H:i') == $end);
		} else {
			return false;
		}
	}

	public function reviews(Place $place)
	{
		if($place->active == 0 || $place->published == 0) {
			return redirect()->route('frontend.company.information',$place);
		}

		$open_hours_select =  [];
		$spatieOpenHours =  [];
		$is_open =  [];
		$openHoursDisplayArray =  [];
		$this->opening_hours = $place->opening_hours;
		if ($place->opening_hours) {
			$open_hours_select =  [
				'selects' => Openhours::getOpeningHoursSelect($place->opening_hours ?? []),
				'days_of_week' => Openhours::$days_of_week,
			];
			$spatieOpenHours = Openhours::getOpenHours($place->opening_hours ?? []);
			$is_open = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;
			$openHoursDisplayArray = $this->_buildOpenHoursDisplayArray();
		}

		return view('frontend.places.reviews', [
			'is_open' => $is_open,
			'open_hours_select' => $open_hours_select,
			'openHoursDisplayArray' => $openHoursDisplayArray,
			'opening_hours' => $place->opening_hours
		])->withPlace($place);
	}

	public function storeReviews(storeReviewsRequest $request,Place $place) {
		$place = $this->PlaceService->storeReviews($request->except('_token', '_method'),$place);
		return redirect()->back()->withFlashSuccess(__('alerts.company.review.create'));
	}

}

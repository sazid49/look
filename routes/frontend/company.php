<?php

use App\Domains\Company\Http\Controllers\Frontend\CompanyController;
use App\Http\Controllers\Frontend\CompaniesController;
use App\Http\Controllers\Frontend\ClaimController;
use App\Http\Controllers\Frontend\FrontController;
use App\Domains\Places\Http\Controllers\Frontend\PlaceController;

Route::group([
	'prefix' => 'companies',
	'as' => 'companies.',
], function () {
    Route::get('/',[CompaniesController::class, 'index'])->name('list');
	Route::get('category/{category}', [CompaniesController::class, 'companiesCategory'])->name('category');
    Route::get('/search', [CompaniesController::class, 'search'])->name('search');
});

Route::group([
	'prefix' => 'claim',
	'as' => 'claim.',
], function () {
	Route::group(['prefix' => '{company}'], function () {
		Route::get('basic', [ClaimController::class, 'basic'])->name('basic');
		Route::patch('update', [ClaimController::class, 'claimUpdate'])->name('update');

		Route::group([
			'prefix' => 'checkout',
			'as' => 'checkout.'
		], function () {
			Route::get('/', [ClaimController::class, 'claimCheckout'])->name('index');
			Route::get('/success', [ClaimController::class, 'claimCheckoutSuccess'])->name('success');
			Route::get('/cancel', [ClaimController::class, 'claimCheckout'])->name('cancel');
			Route::get('/error', [ClaimController::class, 'claimCheckoutError'])->name('error');
		});
	});
});
// Route::get('form2', [CompaniesController::class, 'show2'])->name('form2');

//Route::get('listing', [FrontController::class, 'index'])->name('list.index');
//Route::get('filter', [FrontController::class, 'index'])->name('list.filter');
//Route::get('filter', [FrontController::class, 'faceted']);
//Route::post('load-cat',  [FrontController::class, 'loadCat']);


Route::group(['prefix' => 'listing/company','as' => 'company.',], function () {
//	Route::group(['prefix' => '{company}'], function () {
        //Route::get('/',[CompanyController::class, 'information'])->name('information');
        //Route::get('/{slug}',[CompanyController::class, 'information'])->name('information');
        Route::get('information/{company}/{slug}', [CompanyController::class, 'information'])->name('information');
		Route::get('gallery/{company}/{slug}', [CompanyController::class, 'gallery'])->name('gallery');
		Route::get('team/{company}/{slug}', [CompanyController::class, 'team'])->name('team');

		Route::get('news/{company}/{slug?}', [CompanyController::class, 'news'])->name('news');
		Route::get('news/{company}/{news}/{slug?}', [CompanyController::class, 'newsDetail'])->name('news_detail');

		Route::get('jobs/{company}/{slug?}', [CompanyController::class, 'job'])->name('job-application');

		Route::group(['prefix' => 'job/{company}/{job}/{slug?}'], function () {
			Route::get('/', [CompanyController::class, 'jobDetail'])->name('job_detail');
			Route::get('apply-job', [CompanyController::class, 'applyJob'])->name('apply_job');
			Route::post('/', [CompanyController::class, 'storeApplyJob'])->name('create_apply_job');
		});

		Route::get('offer/{company}/{slug?}', [CompanyController::class, 'offer'])->name('offer');
		Route::get('register/{company}/{slug?}', [CompanyController::class, 'register'])->name('register');
		Route::get('pricelist/{company}/{slug?}', [CompanyController::class, 'priceList'])->name('price_list');
		Route::get('contact/{company}/{slug?}', [CompanyController::class, 'contactUs'])->name('contact_us');
		Route::post('store-contact-us', [CompanyController::class, 'storeContactUs'])->name('create_contact_us');
		Route::post('store-offers/{company}/{slug?}', [CompanyController::class, 'storeOffers'])->name('create_offer');
		Route::get('reviews/{company}/{slug?}', [CompanyController::class, 'reviews'])->name('reviews');
		Route::post('store-reviews/{company}/{slug?}', [CompanyController::class, 'storeReviews'])->name('store_reviews');

		Route::get('claim/{slug?}', [CompanyController::class, 'claim'])->name('claim');
//	});
});

Route::get('listing/places', [FrontController::class, 'placesList'])->name('list.places.index');
Route::get('places/filter', [FrontController::class, 'placesList'])->name('list.places.filter');
Route::post('places/filter', [FrontController::class, 'facetedPlace']);
Route::post('places/load-cat',  [FrontController::class, 'loadPlacesCat'])->name('list.places.load_cat');

Route::group([
	'prefix' => 'places',
	'as' => 'places.',
], function () {
	Route::group(['prefix' => '{place}'], function () {
		Route::get('information/{slug?}', [PlaceController::class, 'information'])->name('information');
		Route::get('gallery/{slug?}', [PlaceController::class, 'gallery'])->name('gallery');
		Route::get('reviews/{slug?}', [PlaceController::class, 'reviews'])->name('reviews');
		Route::post('store-reviews/{slug?}', [PlaceController::class, 'storeReviews'])->name('store_reviews');

	});
});

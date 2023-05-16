<?php

use App\Domains\Company\Http\Controllers\Panel\CompanyController;
use App\Http\Controllers\Panel\ContactUsController;
use App\Http\Controllers\Panel\JobApplicationController;
use App\Http\Controllers\Panel\OfferController;
use App\Http\Controllers\Panel\ReviewController;

// use App\Domains\Places\Http\Controllers\Backend\PlacesController;



Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => 'auth'], function () {

	Route::group([
		'prefix' => 'company',
		'as' => 'company.',
	], function () {
		Route::get('/', [CompanyController::class, 'index'])->name('index');

		// Route::get('create', [CompanyController::class, 'create'])->name('create');
		// Route::post('/', [CompanyController::class, 'store'])->name('store');

		Route::group(['prefix' => '{company}'], function () {
			Route::patch('/update-finance-publish', [CompanyController::class, 'updateFinancePublish'])->name('update_finance_publish');
			Route::delete('/', [CompanyController::class, 'destroy'])->name('destroy');

			Route::get('register', [CompanyController::class, 'register'])->name('register');
			Route::patch('/register', [CompanyController::class, 'updateRegister'])->name('update_register');

			Route::get('information', [CompanyController::class, 'information'])->name('information');
			Route::patch('/information', [CompanyController::class, 'updateInformation'])->name('update_information');

			Route::get('interaction', [CompanyController::class, 'interaction'])->name('interaction');
			Route::patch('/interaction', [CompanyController::class, 'updateInteraction'])->name('update_interaction');

			Route::get('review', [CompanyController::class, 'review'])->name('review');
			Route::patch('/review', [CompanyController::class, 'updateReview'])->name('update_review');

			Route::get('contact-form', [CompanyController::class, 'contactForm'])->name('contact_form');
			Route::patch('/contact-form', [CompanyController::class, 'updateContactForm'])->name('update_contact_form');

			Route::get('recommendations', [CompanyController::class, 'recommendations'])->name('recommendations');
			Route::patch('/recommendations', [CompanyController::class, 'updateRecommendations'])->name('update_recommendations');

			Route::get('pricelist', [CompanyController::class, 'pricelist'])->name('pricelist');
			Route::patch('/pricelist', [CompanyController::class, 'updatePriceList'])->name('update_pricelist');

			Route::group([
				'prefix' => 'team',
				'as' => 'team.',
			], function () {
				Route::get('/', [CompanyController::class, 'team'])->name('index');
				Route::patch('/page', [CompanyController::class, 'updateTeamPage'])->name('update_team');

				Route::post('/store', [CompanyController::class, 'storeTeam'])->name('store');
				Route::group(['prefix' => '{team}'], function () {
					Route::get('edit', [CompanyController::class, 'editTeam'])->name('edit');
					Route::get('show', [CompanyController::class, 'showTeam'])->name('show');
					Route::patch('/', [CompanyController::class, 'updateTeam'])->name('update');
					Route::delete('/', [CompanyController::class, 'destroyTeam'])->name('destroy');
				});
			});

			Route::group([
				'prefix' => 'news',
				'as' => 'news.',
			], function () {
				Route::get('/', [CompanyController::class, 'news'])->name('index');
				Route::post('/store', [CompanyController::class, 'storeNews'])->name('store');
				Route::group(['prefix' => '{news}'], function () {
					Route::get('edit', [CompanyController::class, 'editNews'])->name('edit');
					Route::get('show', [CompanyController::class, 'showNews'])->name('show');
					Route::patch('/', [CompanyController::class, 'updateNews'])->name('update');
					Route::delete('/', [CompanyController::class, 'destroyNews'])->name('destroy');
				});
			});

			Route::group([
				'prefix' => 'gallery',
				'as' => 'gallery.',
			], function () {
				Route::get('/', [CompanyController::class, 'gallery'])->name('index');
				Route::patch('/page', [CompanyController::class, 'updateGalleryPage'])->name('update_gallery');
				Route::post('/store', [CompanyController::class, 'storeGallery'])->name('store');
				Route::group(['prefix' => '{gallery}'], function () {
					Route::delete('/', [CompanyController::class, 'destroyGallery'])->name('destroy');
				});
			});

			Route::group([
				'prefix' => 'job-application',
				'as' => 'job_application.',
			], function () {
				Route::get('/', [CompanyController::class, 'job'])->name('index');
				Route::post('/store', [CompanyController::class, 'storeJob'])->name('store');
				Route::group(['prefix' => '{job}'], function () {
					Route::get('edit', [CompanyController::class, 'editJob'])->name('edit');
					Route::get('show', [CompanyController::class, 'showJob'])->name('show');
					Route::patch('/', [CompanyController::class, 'updateJob'])->name('update');
					Route::delete('/', [CompanyController::class, 'destroyJob'])->name('destroy');
				});
			});

			Route::get('seo', [CompanyController::class, 'editSeo'])->name('seo');
			Route::patch('/seo', [CompanyController::class, 'updateSeo'])->name('update_seo');
		});
	});


	Route::group([
		'prefix' => 'offers',
		'as' => 'offers.',
	], function () {
		Route::get('/', [OfferController::class, 'index'])->name('index');

		Route::get('create', [OfferController::class, 'create'])->name('create');
		Route::post('/', [OfferController::class, 'store'])->name('store');

		Route::group(['prefix' => '{offer}'], function () {
			Route::get('show', [OfferController::class, 'show'])->name('show');
			Route::delete('/', [OfferController::class, 'destroy'])->name('delete');

		});
	});


	Route::group([
		'prefix' => 'job-application',
		'as' => 'job_application.',
	], function () {
		Route::get('/', [JobApplicationController::class, 'index'])->name('index');

		Route::group(['prefix' => '{application}'], function () {
			Route::get('show', [JobApplicationController::class, 'show'])->name('show');
			Route::delete('/', [JobApplicationController::class, 'destroy'])->name('delete');
		});
	});

	Route::group([
		'prefix' => 'contactus',
		'as' => 'contactus.',
	], function () {
		Route::get('/', [ContactUsController::class, 'index'])->name('index');

		Route::group(['prefix' => '{contact}'], function () {
			Route::get('show', [ContactUsController::class, 'show'])->name('show');
			Route::delete('/', [ContactUsController::class, 'destroy'])->name('delete');
		});
	});

	Route::group([
		'prefix' => 'reviews',
		'as' => 'reviews.',
	], function () {
		Route::get('/', [ReviewController::class, 'index'])->name('index');

		Route::group(['prefix' => '{review}'], function () {
			Route::get('show', [ReviewController::class, 'show'])->name('show');
			Route::post('replay', [ReviewController::class, 'replay'])->name('replay');
			Route::delete('/', [ReviewController::class, 'destroy'])->name('delete');
		});
	});

	// Route::group([
	// 	'prefix' => 'places',
	// 	'as' => 'places.',
	// ], function () {
	// 	Route::group([
	// 		'middleware' => ['role:' . config('boilerplate.access.role.admin')],
	// 	], function () {
	// 		Route::get('/', [PlacesController::class, 'index'])->name('index');
	// 		Route::get('/list', [PlacesController::class, 'index1'])->name('index1');

	// 		Route::get('create', [PlacesController::class, 'create'])->name('create');
	// 		Route::post('/', [PlacesController::class, 'store'])->name('store');

	// 		Route::group(['prefix' => '{place}'], function () {
	// 			Route::get('edit', [PlacesController::class, 'edit'])->name('edit');
	// 			Route::patch('/', [PlacesController::class, 'update'])->name('update');
	// 			Route::get('show', [PlacesController::class, 'show'])->name('show');
	// 			Route::delete('/', [PlacesController::class, 'destroy'])->name('destroy');

	// 			Route::get('information', [PlacesController::class, 'information'])->name('information');
	// 			Route::patch('/information', [PlacesController::class, 'updateInformation'])->name('update_information');

	// 			Route::get('contact-form', [PlacesController::class, 'contactForm'])->name('contact_form');
	// 			Route::patch('/contact-form', [PlacesController::class, 'updateContactForm'])->name('update_contact_form');


	// 			Route::group([
	// 				'prefix' => 'gallery',
	// 				'as' => 'gallery.',
	// 			], function () {
	// 				Route::get('/', [PlacesController::class, 'gallery'])->name('index');
	// 				Route::post('/store', [PlacesController::class, 'storeGallery'])->name('store');
	// 				Route::group(['prefix' => '{gallery}'], function () {
	// 					Route::delete('/', [PlacesController::class, 'destroyGallery'])->name('destroy');
	// 				});
	// 			});

	// 			Route::get('seo', [PlacesController::class, 'editSeo'])->name('seo');
	// 			Route::patch('/seo', [PlacesController::class, 'updateSeo'])->name('update_seo');
	// 		});
	// 	});
	// });

});

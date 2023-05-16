<?php

use App\Domains\Company\Http\Controllers\Backend\CompanyController;
use App\Domains\Company\Http\Controllers\Backend\PricingController;
use App\Domains\Places\Http\Controllers\Backend\PlacesController;
use App\Http\Controllers\Backend\CMSController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OfferFieldController;
use App\Http\Controllers\Backend\TagsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Middleware\VerifyCsrfToken;
use Tabuna\Breadcrumbs\Trail;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
	->name('dashboard')
	->breadcrumbs(function (Trail $trail) {
		$trail->push(__('Home'), route('admin.dashboard'));
	});

Route::group([
	'prefix' => 'company',
	'as' => 'company.',
], function () {
	Route::group([
		'middleware' => ['role:' . config('boilerplate.access.role.admin')],
	], function () {
		Route::get('/', [CompanyController::class, 'index'])->name('index');

		Route::get('new', [CompanyController::class, 'new'])->name('new');
		Route::get('create', [CompanyController::class, 'create'])->name('create');
		Route::post('/', [CompanyController::class, 'store'])->name('store');

		Route::group(['prefix' => '{company}'], function () {
			Route::get('edit', [CompanyController::class, 'edit'])->name('edit');
			Route::patch('/', [CompanyController::class, 'update'])->name('update');
			Route::patch('/update-finance-publish', [CompanyController::class, 'updateFinancePublish'])->name('update_finance_publish');
			Route::get('show', [CompanyController::class, 'show'])->name('show');
			Route::delete('/', [CompanyController::class, 'destroy'])->name('destroy');

			Route::get('register', [CompanyController::class, 'register'])->name('register');
			Route::patch('/register', [CompanyController::class, 'updateRegister'])->name('update_register');

            Route::patch('update_payment',[CompanyController::class,'updatePayment'])->name('update_payment');
            Route::post('update_listing_settings',[CompanyController::class,'updateListing'])->name('update_listing_settings');
            Route::post('update_claim_settings',[CompanyController::class,'updateClaim'])->name('update_claim_settings');

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

			// Route::get('team', [CompanyController::class, 'team'])->name('team');
			Route::patch('/team-page', [CompanyController::class, 'updateTeamPage'])->name('update_team');
			Route::patch('/gallery-page', [CompanyController::class, 'updateGalleryPage'])->name('update_gallery');
			Route::patch('/job-page', [CompanyController::class, 'updateJobPage'])->name('update_job');

            Route::post('/update-show-tab',[CompanyController::class,'updateShowTab'])->name('update_show_tab');

			Route::group([
				'prefix' => 'team',
				'as' => 'team.',
			], function () {
				Route::get('/', [CompanyController::class, 'team'])->name('index');
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
				Route::post('/store', [CompanyController::class, 'storeGallery'])->name('store');
                Route::post('update',[CompanyController::class,'updateGallery'])->name('update')->withoutMiddleware(VerifyCsrfToken::class);
                Route::group(['prefix' => '{gallery}'], function () {
                    Route::get('edit',[CompanyController::class,'editGallery'])->name('edit');
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

            Route::post('update/logo',[CompanyController::class,'updateLogo'])->name('logo.update')->withoutMiddleware(VerifyCsrfToken::class);
            Route::post('update/thumbnail',[CompanyController::class,'updateThumbnail'])->name('thumbnail.update')->withoutMiddleware(VerifyCsrfToken::class);
		});

Route::post('pricelist/{id}',[PricingController::class,'thumbnail'])->name('pricing.thumbnail')->withoutMiddleware(VerifyCsrfToken::class);
	});
});


Route::group([
	'prefix' => 'offer-field',
	'as' => 'offer_field.',
	'middleware' => ['role:' . config('boilerplate.access.role.admin')],
], function () {
	Route::get('/', [OfferFieldController::class, 'index'])->name('index');

	Route::get('create', [OfferFieldController::class, 'create'])->name('create');
	Route::post('/', [OfferFieldController::class, 'store'])->name('store');

	Route::group(['prefix' => '{offerFieldGroup}'], function () {
		Route::get('edit', [OfferFieldController::class, 'edit'])->name('edit');
		Route::patch('/', [OfferFieldController::class, 'update'])->name('update');
		Route::get('show', [OfferFieldController::class, 'show'])->name('show');
		Route::delete('/', [OfferFieldController::class, 'destroy'])->name('destroy');

	});
});

Route::group([
	'prefix' => 'cms',
	'as' => 'cms.',
	'middleware' => ['role:' . config('boilerplate.access.role.admin')],
], function () {
	Route::get('/', [CMSController::class, 'index'])->name('index');

	Route::get('create', [CMSController::class, 'create'])->name('create');
	Route::post('/', [CMSController::class, 'store'])->name('store');

	Route::group(['prefix' => '{cms}'], function () {
		Route::get('edit', [CMSController::class, 'edit'])->name('edit');
		Route::patch('/', [CMSController::class, 'update'])->name('update');
		Route::get('show', [CMSController::class, 'show'])->name('show');
		Route::delete('/', [CMSController::class, 'destroy'])->name('destroy');
	});
});

Route::group([
	'prefix' => 'tags',
	'as' => 'tags.',
	'middleware' => ['role:' . config('boilerplate.access.role.admin')],
], function () {
	Route::get('/', [TagsController::class, 'index'])->name('index');

	Route::get('create', [TagsController::class, 'create'])->name('create');
	Route::post('/', [TagsController::class, 'store'])->name('store');

	Route::group(['prefix' => '{tag}'], function () {
		Route::get('edit', [TagsController::class, 'edit'])->name('edit');
		Route::patch('/', [TagsController::class, 'update'])->name('update');
		Route::get('show', [TagsController::class, 'show'])->name('show');
		Route::delete('/', [TagsController::class, 'destroy'])->name('destroy');

	});
});


Route::group([
	'prefix' => 'category',
	'as' => 'category.',
    'middleware' => ['role:' . config('boilerplate.access.role.admin')],
], function () {
	Route::get('/', [CategoryController::class, 'index'])->name('index');

	Route::get('create', [CategoryController::class, 'create'])->name('create');
	Route::post('/', [CategoryController::class, 'store'])->name('store');

	Route::group(['prefix' => '{categories}'], function () {
		Route::get('edit', [CategoryController::class, 'edit'])->name('edit');
		Route::patch('/', [CategoryController::class, 'update'])->name('update');
		Route::get('show', [CategoryController::class, 'show'])->name('show');
		Route::delete('/', [CategoryController::class, 'destroy'])->name('destroy');

	});
});

Route::group([
	'prefix' => 'places',
	'as' => 'places.',
], function () {
	Route::group([
		'middleware' => ['role:' . config('boilerplate.access.role.admin')],
	], function () {
		Route::get('/', [PlacesController::class, 'index'])->name('index');
		Route::get('/list', [PlacesController::class, 'index1'])->name('index1');

		Route::get('create', [PlacesController::class, 'create'])->name('create');
		Route::post('/', [PlacesController::class, 'store'])->name('store');

		Route::group(['prefix' => '{place}'], function () {
			Route::get('edit', [PlacesController::class, 'edit'])->name('edit');
			Route::patch('/', [PlacesController::class, 'update'])->name('update');
			Route::get('show', [PlacesController::class, 'show'])->name('show');
			Route::delete('/', [PlacesController::class, 'destroy'])->name('destroy');

			Route::get('information', [PlacesController::class, 'information'])->name('information');
			Route::patch('/information', [PlacesController::class, 'updateInformation'])->name('update_information');

			Route::get('contact-form', [PlacesController::class, 'contactForm'])->name('contact_form');
			Route::patch('/contact-form', [PlacesController::class, 'updateContactForm'])->name('update_contact_form');


			Route::group([
				'prefix' => 'gallery',
				'as' => 'gallery.',
			], function () {
				Route::get('/', [PlacesController::class, 'gallery'])->name('index');
				Route::post('/store', [PlacesController::class, 'storeGallery'])->name('store');
				Route::group(['prefix' => '{gallery}'], function () {
					Route::delete('/', [PlacesController::class, 'destroyGallery'])->name('destroy');
				});
			});

			Route::get('seo', [PlacesController::class, 'editSeo'])->name('seo');
			Route::patch('/seo', [PlacesController::class, 'updateSeo'])->name('update_seo');
		});
	});
});



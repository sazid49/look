<?php

use App\Domains\Company\Models\Company;
use App\Http\Controllers\LocaleController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\LoginController as AdminLoginController;
/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
});
Route::get('/migrate/refresh', function () {
    Artisan::call('migrate:refresh');
});
Route::get('/seed', function () {
    Artisan::call('db:seed');
});

Route::get('cache_clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    //  Clears route cache
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    // \Cache::flush();
    // \Artisan::call('optimize');
    // exec('composer dump-autoload');
    echo "Cache cleared!";
});

// Switch between the included languages
Route::post('lang', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
/* Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});
 */


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', function(){
		return redirect()->route(homeRoute());
	})->name('index');

    Route::group(['middleware' => 'guest'], function () {
        // Authentication
        // Route::get('/', [LoginController::class, 'showAdminLoginForm'])->name('login');
        //Route::get('/', [AdminLoginController::class, 'showAdminLoginForm'])->name('login');
        Route::get('/login', [AdminLoginController::class, 'showAdminLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    });

    /*
     * These routes can only be accessed by users with type `admin`
     */
    Route::group(['middleware' => 'admin'], function () {
        includeRouteFiles(__DIR__.'/backend/');
    });
});

/* Route::get('fake-company-tabs',function(){
    $companies = \App\Domains\Company\Models\Company::query()->get();
    foreach ($companies as $company){
        $data = [
            'company_id' => $company->id,
            'show_interraction' => rand(0,1),
            'show_jobs' => rand(0,1),
            'show_gallery' => rand(0,1),
            'show_review' => rand(0,1),
            'show_contactform' => rand(0,1),
            'show_pricelist' => rand(0,1),
            'show_team' => rand(0,1),
            'show_news' => rand(0,1),
            'show_register' => rand(0,1),
        ];
        \App\Domains\Company\Models\CompanyTabs::query()->create($data);
    }
}); */

/* Route::get('fake-payments',function(){
    $companies = \App\Domains\Company\Models\Company::query()->get();
    foreach ($companies as $company){
        $data = [
            'transaction_id' => 'lorem ipsum',
            'company_id' => $company->id,
            'payment_method' => 'lorem',
            'detail' => 'lorem ipsum dolor sumit',
            'raw_data' => 'lorem ipsum dolor sumit',
            'payer' => rand(0,1),
            'not_payer_reason' => '',
            'price_contract' => rand(1,100),
            'price_actual' => rand(1,100),
        ];
        \App\Domains\Company\Models\Payment::query()->create($data);
    }
}); */

 /* Slugify empty slugged companies (had the case, that we had a lot of companys without slug, so we added them again */
Route::get('update-empty-slug',function(){
    $companies = Company::query()->where('slug','')->limit(10000)->get();
    foreach ($companies as $company){
        $slug = Str::slug($company->company_name);
        try {
            $company->update(['slug'=>$slug]);
        }catch (Exception $e){
            dd($e);
        }
    }
    dd('done');
});

<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Company\Models\Company;

/**
 * Class CronController.
 */
class CronController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
		$Company = Company::count();
		if ($Company < 800000) {
			\Artisan::call('db:seed --class=CompanySeeder');
		}
    }
}

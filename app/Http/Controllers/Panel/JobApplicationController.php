<?php

namespace App\Http\Controllers\Panel;

use App\Domains\Company\Models\Application;
use App\Domains\Company\Models\Offers;
use DB;
use Exception;
use Illuminate\Http\Request;
use Storage;

/**
 * Class JobApplicationController.
 */
class JobApplicationController
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		return view('frontend.panel.job_application.index');
	}

	public function show(Application $application)
	{
		return view('frontend.panel.job_application.show')
			->withApplication($application);
	}

	public function destroy(Application $application)
	{
		DB::beginTransaction();
		try {
			if (Storage::disk('public')->exists($application['motivation_letter'])) {
				Storage::disk('public')->delete($application['motivation_letter']);
			}
			if (Storage::disk('public')->exists($application['CV'])) {
				Storage::disk('public')->delete($application['CV']);
			}
			if (Storage::disk('public')->exists($application['certificate_of_employment'])) {
				Storage::disk('public')->delete($application['certificate_of_employment']);
			}
			if (Storage::disk('public')->exists($application['diplomas_and_certificates'])) {
				Storage::disk('public')->delete($application['diplomas_and_certificates']);
			}

			$application->delete();
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('frontend.panel.job_application.index')->withFlashDanger(__('alerts.job_application.delete_error'));
		}
		DB::commit();
		return redirect()->route('frontend.panel.job_application.index')->withFlashSuccess(__('alerts.job_application.delete'));
	}
}

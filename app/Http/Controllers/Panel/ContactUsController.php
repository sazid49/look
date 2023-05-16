<?php

namespace App\Http\Controllers\Panel;

use App\Domains\Company\Models\Application;
use App\Domains\Company\Models\Contact;
use App\Domains\Company\Models\Offers;
use DB;
use Exception;
use Illuminate\Http\Request;
use Storage;

/**
 * Class ContactUsController.
 */
class ContactUsController
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{	
		return view('frontend.panel.contact_us.index');
	}

	public function show(Contact $contact)
	{
		return view('frontend.panel.contact_us.show')
			->withContact($contact);
	}

	public function destroy(Contact $contact)
	{
		DB::beginTransaction();
		try {
			$contact->delete();
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('frontend.panel.contactus.index')->withFlashDanger(__('alerts.contactus.delete_error'));
		}
		DB::commit();
		return redirect()->route('frontend.panel.contactus.index')->withFlashSuccess(__('alerts.contactus.delete'));
	}
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Services\UserService;
use App\Domains\Company\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UpdateClaimRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Services\Payrexx;

class ClaimController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display the claim basic page
     *
     * @param Company $company
     * @return View
     */
	public function basic(Company $company): View
    {
        return view('frontend.claim.basic',compact('company'));
    }

	public function claimUpdate(UpdateClaimRequest $request,Company $company) {
		session()->put('claim_page',$request->all());

		return redirect()->route('frontend.claim.checkout.index',$company);
	}

    public function claimCheckout(Company $company){
		if(!session()->get('claim_page')) {
			return redirect()->route('frontend.index');
		}
		$claim_page = session()->get('claim_page');
		$registration_fee_amount = 250;
		$payment_ref = uniqid ();
		session()->put('payment_ref',$payment_ref);
        $transaction_request_response = Payrexx::getTransactionId( $payment_ref, $registration_fee_amount,$company->id);
		$transaction_url = $transaction_request_response->getLink();
		$transaction_id = $transaction_request_response->getId();
		session()->put('transaction_id',$transaction_id);
        return view('frontend.claim.checkout',['claim_page'=>$claim_page,'transaction_url'=>$transaction_url]);
    }

	public function claimCheckoutSuccess(Request $request,Company $company)
	{
		if(!session()->get('claim_page')) {
			return redirect()->route('frontend.index');
		}
		$payment_ref = session()->get('payment_ref');
		$transaction_id = session()->get('transaction_id');
		$transaction_request_response = Payrexx::getTransactionDetail($transaction_id);
		$referenceId = $transaction_request_response->getReferenceId();

		if($payment_ref == $referenceId) {
			$claim_page = session()->get('claim_page');
			$this->userService->claimRegisterUser($claim_page,$company);
			return redirect()->route('frontend.company.information',$company)->withFlashSuccess(__('alerts.company.claim.create'));
		} else {
			return redirect()->route('frontend.index')->withFlashSuccess(__('alerts.company.claim.payment_failed'));
		}
	}

	public function claimCheckoutError(Request $request,Company $company)
	{
		$datatransTrxId = $request->datatransTrxId;
		// $datatrans_transaction_request_response = Datatrans::getTransactionDetail($datatransTrxId);
		return redirect()->route('frontend.index')->withFlashSuccess(__('alerts.company.claim.payment_failed'));
		// dd($datatrans_transaction_request_response);
	}
}

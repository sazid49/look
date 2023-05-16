<?php

/**
 * Created by PhpStorm.
 * User: Radd, Norrin
 * Date: 11/19/2019
 * Time: 10:51 PM
 */

namespace App\Services;

use stdClass;
use function base64_encode;

class Datatrans
{
	private static $url = "https://api.sandbox.datatrans.com/v1/transactions";

	public static function getTransactionId($uuid, $amount, $companyId)
	{
		$request_params_json = json_encode(self::getRequestParams($uuid, $amount, $companyId));
		// From URL to get webpage contents.
		// Initialize a CURL session.
		$ch = curl_init(self::$url);

		$authorization = base64_encode(env('DATATRANS_MERCHANTID') . ":" . env('DATATRANS_PASSWORD'));

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request_params_json);

		// Set HTTP Header for POST request
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Basic ' . $authorization,
				'Content-Type: application/json',
				'Content-Length: ' . strlen($request_params_json)
			)
		);

		// Submit the POST request
		$result = curl_exec($ch);

		// Close cURL session handle
		curl_close($ch);

		return $result;
	}

	public static function getRequestParams($uuid, $amount, $companyId)
	{
		$requestParams = new stdClass();
		$redirects = new stdClass();


		$redirects->successUrl  = route('frontend.claim.checkout.success',$companyId);
		$redirects->cancelUrl   = route('frontend.claim.checkout.error',$companyId);
		$redirects->errorUrl    = route('frontend.claim.checkout.error',$companyId);

		$requestParams->currency = "CHF";
		$requestParams->refno = $uuid;
		$requestParams->amount = $amount;
		$requestParams->redirect = $redirects;

		return $requestParams;
	}

	public static function getTransactionDetail($transactionId)
	{
		$url = self::$url.'/'.$transactionId;
		// From URL to get webpage contents.
		// Initialize a CURL session.
		$ch = curl_init($url);

		$authorization = base64_encode(env('DATATRANS_MERCHANTID') . ":" . env('DATATRANS_PASSWORD'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $request_params_json);

		// Set HTTP Header for POST request
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Basic ' . $authorization,
				'Content-Type: application/json',
				// 'Content-Length: ' . strlen($request_params_json)
			)
		);

		// Submit the POST request
		$result = curl_exec($ch);

		// Close cURL session handle
		curl_close($ch);

		return $result;
	}
}

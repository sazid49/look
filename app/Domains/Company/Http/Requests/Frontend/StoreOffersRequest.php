<?php

namespace App\Domains\Company\Http\Requests\Frontend;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreOffersRequest.
 */
class StoreOffersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request_data = [
            //'private_person' => ['required'],
            'company_name' => [Rule::requiredIf(auth()->guest())],
            //'title' => ['required', 'max:100'],
            'firstname' => [Rule::requiredIf(auth()->guest()), 'max:255'],
            'lastname' => [Rule::requiredIf(auth()->guest()), 'max:255'],
            'gen_email' => [Rule::requiredIf(auth()->guest()), 'email'],
            'phone' => [Rule::requiredIf(auth()->guest()), 'max:15'],
            'message' => ['required'],
            'term_condition' => ['accepted'],
        ];

//		foreach ($this->company->category->offerfield as $key => $value) {
//			if($value->is_required) {
//				$request_data['offerfield_'.$value->id] = ['required'];
//			}
//		}

		return $request_data;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}

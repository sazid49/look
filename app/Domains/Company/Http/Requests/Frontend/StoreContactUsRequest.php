<?php

namespace App\Domains\Company\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreContactUsRequest.
 */
class StoreContactUsRequest extends FormRequest
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
        return [
            //'private_person' => ['required'],
            'company_name' => ['required_unless:gen_private_person,1'],
            //'title' => ['required', 'max:100'],
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'gen_email' => ['required', 'email'],
            'phone' => ['required', 'max:15'],
            'message' => ['required'],
            'term_condition' => ['accepted'],
        ];
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

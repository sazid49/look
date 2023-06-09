<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
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
            'firstname' => ['required', 'max:100'],
            'lastname' => ['required', 'max:100'],
           /*  'email' => [Rule::requiredIf(function () {
				return config('boilerplate.access.user.change_email');
            }), 'max:255', 'email', Rule::unique('users')->ignore($this->user()->id)], */
			'avatar' => ['mimes:png,jpg'],
        ];
    }
}

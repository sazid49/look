<?php

namespace App\Http\Requests\Frontend\User;

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
            'postcode' => ['sometimes'],
            'city' => ['sometimes'],
            'address' => ['sometimes'],
            'birthday' => ['sometimes'],
            'phone' => ['sometimes'],
            'avatar_location' => ['mimes:png,jpg'],
            'id_image' => ['mimes:png,jpg'],
            // 'email' => [Rule::requiredIf(function () {
            //     return config('boilerplate.access.user.change_email');
            // }), 'max:255', 'email', Rule::unique('users')->ignore($this->user()->id)],
        ];
    }
}

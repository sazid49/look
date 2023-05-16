<?php

namespace App\Domains\Places\Http\Requests\Backend;


use Illuminate\Foundation\Http\FormRequest; 

/**
 * Class UpdatePlaceContactFormRequest.
 */
class UpdatePlaceContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		return [
            'active' => ['required'],
            'show_contactform' => ['required'],
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

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('Only the administrator can update this item.'));
    }
}

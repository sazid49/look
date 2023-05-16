<?php

namespace App\Domains\Company\Http\Requests\Backend;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCompanyTeamRequest.
 */
class UpdateCompanyTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin() || ($this->company->claimed_by == Auth()->user()->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			//'payer' => ['required'],
			//'active' => ['required'],
			//'published' => ['required'],
			//'claimed' => ['required'],

            'name' => ['required', 'max:255'],
            'designation' => ['required', 'max:255'],
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

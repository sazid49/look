<?php

namespace App\Domains\Company\Http\Requests\Backend;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateCompanyRequest.
 */
class UpdateCompanyRequest extends FormRequest
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
            'company_name' => ['required', 'max:100'],
            'firstname' => ['max:100'],
            // 'lastname' => ['required', 'max:100'],
            // 'email' => ['max:100', 'email', Rule::unique('companies')->ignore($this->company->id)],
            'phone_1' => ['max:15'],
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

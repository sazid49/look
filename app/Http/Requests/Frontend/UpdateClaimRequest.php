<?php

namespace App\Http\Requests\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


/**
 * Class UpdateClaimRequest.
 */
class UpdateClaimRequest extends FormRequest
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
		if (auth()->check()) {
			return [
				'company_name' => ['required', 'max:191'],
				'email' => ['max:255', 'email', Rule::unique(Company::class)->ignore($this->company->id),Rule::unique(User::class)->ignore($this->company->id)]
			];
		} else {
			return [
				'company_name' => ['required', 'max:191'],
				'email' => ['max:255', 'email', Rule::unique(Company::class)->ignore($this->company->id),Rule::unique(User::class)->ignore($this->company->id)],
				'firstname' => ['required', 'max:191'],
				'lastname' => ['required', 'max:191'],
				'password' => ['required', 'max:191',PasswordRules::changePassword(
					$this->company->email,
					config('boilerplate.access.user.password_history') ? 'current_password' : null
				)],
			];
		}
        
    }
}

<?php

namespace App\Domains\Company\Http\Requests\Backend;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCompanyJobRequest.
 */
class UpdateCompanySeoRequest extends FormRequest
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
			'information_metatitle_de' => ['max:255'],
			'information_metatitle_ft' => ['max:255'],
			'information_metatitle_en' => ['max:255'],
			'information_metatitle_it' => ['max:255'],

			'interraction_metatitle_de' => ['max:255'],
			'interraction_metatitle_ft' => ['max:255'],
			'interraction_metatitle_en' => ['max:255'],
			'interraction_metatitle_it' => ['max:255'],

			'job_metatitle_de' => ['max:255'],
			'job_metatitle_ft' => ['max:255'],
			'job_metatitle_en' => ['max:255'],
			'job_metatitle_it' => ['max:255'],

			'kontaktformular_metatitle_de' => ['max:255'],
			'kontaktformular_metatitle_ft' => ['max:255'],
			'kontaktformular_metatitle_en' => ['max:255'],
			'kontaktformular_metatitle_it' => ['max:255'],

			'empfehlungen_metatitle_de' => ['max:255'],
			'empfehlungen_metatitle_ft' => ['max:255'],
			'empfehlungen_metatitle_en' => ['max:255'],
			'empfehlungen_metatitle_it' => ['max:255'],

			'preisliste_metatitle_de' => ['max:255'],
			'preisliste_metatitle_ft' => ['max:255'],
			'preisliste_metatitle_en' => ['max:255'],
			'preisliste_metatitle_it' => ['max:255'],

			'team_metatitle_de' => ['max:255'],
			'team_metatitle_ft' => ['max:255'],
			'team_metatitle_en' => ['max:255'],
			'team_metatitle_it' => ['max:255'],

			'news_metatitle_de' => ['max:255'],
			'news_metatitle_ft' => ['max:255'],
			'news_metatitle_en' => ['max:255'],
			'news_metatitle_it' => ['max:255'],

			'galerie_metatitle_de' => ['max:255'],
			'galerie_metatitle_ft' => ['max:255'],
			'galerie_metatitle_en' => ['max:255'],
			'galerie_metatitle_it' => ['max:255'],

			'rating_metatitle_de' => ['max:255'],
			'rating_metatitle_ft' => ['max:255'],
			'rating_metatitle_en' => ['max:255'],
			'rating_metatitle_it' => ['max:255'],
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

<?php

namespace App\Domains\Company\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreApplyJobRequest.
 */
class StoreApplyJobRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:15'],
            'date_of_birth' => ['required'],
            'motivation_letter' => ['required','mimes:pdf,doc,docx,zip'],
            'CV' => ['required','mimes:pdf,doc,docx,zip'],
            'certificate_of_employment' => ['required','mimes:pdf,doc,docx,zip'],
            'diplomas_and_certificates' => ['required','mimes:pdf,doc,docx,zip'],
            'message' => ['required'],
            'term_condition' => ['required'],
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

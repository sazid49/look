<?php

namespace App\Http\Requests\Backend\CMS;

use App\Models\CMS;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreCMSRequest.
 */
class StoreCMSRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'slug' => ['required',Rule::unique(CMS::class)],
            'meta_title' => ['required'],
            'meta_description' => ['required'],
            'content' => ['required'],
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

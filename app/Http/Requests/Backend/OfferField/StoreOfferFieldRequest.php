<?php

namespace App\Http\Requests\Backend\OfferField;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreOfferFieldRequest.
 */
class StoreOfferFieldRequest extends FormRequest
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
		$option = "";
		if ($this->type == "dropdown" || $this->type == "checkbox" || $this->type == "radio") {
			$option = "required";
		}
        return [
            'label' => ['required', 'max:100'],
            'category_id' => ['required'],
            'type' => ['required'],
            // 'is_required' => ['required'],
            //'option' => [$option],
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

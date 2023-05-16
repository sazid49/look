<?php

namespace App\Domains\Company\Http\Requests\Frontend;

use App\Models\ReviewCategoryCriteria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class storeReviewsRequest.
 */
class storeReviewsRequest extends FormRequest
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
		$data = [];
		if(!Auth()->user()) {
			$data = [
				'firstname' => ['required', 'max:255'],
				'lastname' => ['required', 'max:255'],
				'email' => ['required', 'email'],
                'postcode' => ['required', 'max:15'],
                'review_message' => ['required'],
                'term_condition' => ['required'],
			];
		}



//		if (!$this->company->category->reviewcategorycriteria->isEmpty()) {
//            foreach ($this->company->category->reviewcategorycriteria as $reviewcategorycriteria) {
//				$data['review'][$reviewcategorycriteria->review_criteria->id] = 'required';
//			}
//		} else {
//			$reviewcategorycriteriaObj = ReviewCategoryCriteria::query()->where('category_id', 0)
//                ->where('category_type', 'company')
//                ->get();
//			foreach ($reviewcategorycriteriaObj as $reviewcategorycriteria) {
//				$data['review'][$reviewcategorycriteria->review_criteria->id] = 'required';
//			}
//		}

        $data['review'] = ['required'];
		$data['review_message'] =  ['required'];
		$data['term_condition'] =  ['required'];
		return $data;

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

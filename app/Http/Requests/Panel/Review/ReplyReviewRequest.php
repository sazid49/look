<?php

namespace App\Http\Requests\Panel\Review;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


/**
 * Class ReplyReviewRequest.
 */
class ReplyReviewRequest extends FormRequest
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
			'replay_message' => ['required'],
		];
    }
}

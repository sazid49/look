<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class Captcha.
 */
class CaptchaV2 implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function passes($attribute, $value)
    {
        if (empty($value)) {
            return false;
        }

        $response = json_decode((new Client([
            'timeout' => config('boilerplate.access.captcha.configs.options.timeout'),
        ]))->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRETKEY'),
                'remoteip' => request()->getClientIp(),
                'response' => $value,
            ],
        ])->getBody(), true);

        return isset($response['success']) && $response['success'] === true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The captcha was invalid.');
    }
}

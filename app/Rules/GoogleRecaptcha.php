<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class GoogleRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->validateRecaptcha($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The google recaptcha challenge is not correct.';
    }

    private function validateRecaptcha($value) : bool
    {
        $response = Http::asForm()->post(
            env('GOOGLE_RECAPTCHA_URL'),
            [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $value
            ]
        );
        $body = json_decode((string)$response->getBody());
        if((bool)$body->success){
            return true;
        }
        return false;
    }
}

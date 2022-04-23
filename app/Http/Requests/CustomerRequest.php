<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\GoogleRecaptcha;
use App\Rules\RightCpf;

class CustomerRequest extends FormRequest
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
            'name'                  =>  ['required','string'],
            'email'                 =>  ['present','email'],
            'cpf'                   =>  ["required","unique:customers,cpf,{$this->id}",new RightCpf],
            'g-recaptcha-response'  =>   ['required',new GoogleRecaptcha],
        ];
    }
}

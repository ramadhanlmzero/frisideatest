<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Traits\ApiResponser;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    use ApiResponser;

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->errorResponse($validator->errors())
        );
    }
}

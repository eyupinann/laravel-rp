<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class AbstractFormRequest extends FormRequest
{
    public function authorize ()
    {

        return true;
    }

}

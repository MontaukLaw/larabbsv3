<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class ReplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }
}
<?php

namespace Fschirinzi\LaraMote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
{
    public function rules()
    {
        return [
            'model' => ['required', 'string'],
            'key' => ['nullable', 'string'],
            'key_value' => ['required'],
            'relationships' => ['array'],
            'limit' => ['integer'],
            'showHiddenModelAttr' => ['sometimes', 'boolean'],
        ];
    }
}

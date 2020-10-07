<?php

namespace Fschirinzi\LaraMote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'action' => ['required', 'in:make,create'],
            'model' => ['required', 'string'],
            'states' => ['sometimes', 'array'],
            'amount' => ['sometimes', 'integer'],
            'name' => ['sometimes', 'string'],
            'showHiddenModelAttr' => ['sometimes', 'boolean'],
            'overrides' => ['sometimes', 'array'],
        ];
    }
}

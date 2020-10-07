<?php

namespace Fschirinzi\LaraMote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the job request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key_value' => ['required'],
            'remember' => ['sometimes', 'boolean'],
            'key' => ['nullable', 'string'],
            'model' => ['nullable', 'string'],
        ];
    }
}

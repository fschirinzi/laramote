<?php

namespace Fschirinzi\LaraMote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtisanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the job request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'command' => ['required'],
            'parameters' => ['sometimes', 'array'],
        ];
    }
}

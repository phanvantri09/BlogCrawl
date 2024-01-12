<?php

namespace App\Http\Requests\video;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestVideo extends FormRequest
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
            //
            'title' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không để trống',
        ];
    }
}

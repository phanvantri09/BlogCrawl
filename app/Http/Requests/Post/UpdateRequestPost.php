<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestPost extends FormRequest
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
            'description' => 'required',
            'des_preview' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không để trống',
            'description.required' => 'Không để trống',
            'des_preview.required' => 'Không để trống',
        ];
    }
}

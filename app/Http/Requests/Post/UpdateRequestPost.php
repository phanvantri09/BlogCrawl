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
            'content' => 'required:posts',
            'title' => 'required:posts'
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Không để trống',
            'title.required' => 'Không để trống',
            
        ];
    }
}

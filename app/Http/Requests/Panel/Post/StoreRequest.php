<?php

namespace App\Http\Requests\Panel\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'cover_image' => 'nullable|image'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Post Name',
            'content' => 'Post Content',
            'status' => 'Post Status',
            'cover_image' => 'Post Cover Image'
        ];
    }
}

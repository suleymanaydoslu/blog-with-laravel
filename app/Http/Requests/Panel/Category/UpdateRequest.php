<?php

namespace App\Http\Requests\Panel\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $category = $this->route('category');
        return [
            'title' => 'required|unique:categories,id,'.$category->id
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Category Name'
        ];
    }
}

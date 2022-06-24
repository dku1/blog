<?php

namespace App\Http\Requests\Admin\Post;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'content' => 'required',
            'preview_image' => 'nullable|image:jpg,jpeg,png,',
            'main_image' => 'nullable|image:jpg,jpeg,png,',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо ввести название',
            'title.min' => 'Минимум 3 символа',
            'content.required' => 'Контент обязателен',
        ];
    }
}

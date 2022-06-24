<?php

namespace App\Http\Requests\Admin\Post;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|unique:categories,title',
            'content' => 'required',
            'preview_image' => 'required|image:jpg,jpeg,png,',
            'main_image' => 'required|image:jpg,jpeg,png,',
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
            'title.unique' => 'Название должно быть уникальным',
            'content.required' => 'Контент обязателен',
            'preview_image.required' => 'Превью обязательно',
            'main_image.required' => 'Главное изображение обязательно',
            'preview_image.image' => 'Превью не соответствует формату',
            'main_image.image' => 'Главное изображение не соответствует формату',
        ];
    }
}

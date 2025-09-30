<?php

namespace App\Http\Requests\Admin\Book;

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
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'prev_img' => 'nullable|file',
            'image' => 'nullable|file',
            'author_ids' => 'nullable|array',
            'author_ids.*' => 'nullable|integer|exists:authors,id',
            'year' => 'nullable|string',
            'isbn' => 'nullable|string',
            'pub_number' => 'nullable|string',
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'description.required' => 'Это поле необходимо для заполнения',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'prev_img.required' => 'Это поле необходимо для заполнения',
            'prev_img.file' => 'Необходимо выбрать файл',
            'image.required' => 'Это поле необходимо для заполнения',
            'image.file' => 'Необходимо выбрать файл',
            'author_ids.array' => 'Необходимо отправить массив данных',
        ];
    }

}

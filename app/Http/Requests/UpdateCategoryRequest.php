<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
                'min:3',
                Rule::unique('categories')->ignore($this->category->id)
            ],

            'parent_id' => 'nullable|exists:categories,id|not_in:' . $this->category->id,
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'name.min' => 'Tối thiểu 3 ký tự',
            'name.max' => 'Tên danh mục không được vượt quá 50 ký tự.',
            'parent_id.exists' => 'Danh mục cha không hợp lệ.',
            'parent_id.not_in' => 'Danh mục cha không thể là chính nó.',
        ];
    }
}

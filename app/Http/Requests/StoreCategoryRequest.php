<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc!!!!',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'name.max' => 'Tối đa 50 ký tự',
            'name.min' => 'Tối thiểu 3 ký tự',
            'parent_id.exists' => 'Danh mục cha không hợp lệ.',
        ];
    }
}

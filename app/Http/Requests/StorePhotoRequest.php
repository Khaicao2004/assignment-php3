<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
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
           'file_path' => '|required|mimes:jpg,png|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
           'file_path.mimes' => 'Ảnh phải là file jpg png',
           'file_path.required' => 'Ảnh là bắt buộc',
           'file_path.max' => 'Ảnh không được quá 2MB',
        ];
    }
}

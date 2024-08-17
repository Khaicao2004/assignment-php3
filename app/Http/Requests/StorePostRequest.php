<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function rules()
    {
       return  [
            'name' => 'required|string|max:255',
            'sku' => 'required', 
            'overview' => 'required|string', 
            'content' => 'required|string', 
            'tags' => 'array|required',
            'tag.*' => 'integer|exists:tags,id',
            'photos' => 'array',
            'photos.*' => 'image|mimes:png,jpg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường name là bắt buộc!!!!',
            'name.max' => 'Tối đa 50 ký tự',
            'name.min' => 'Tối thiểu 1 ký tự',
            'tags.required' => 'Là bắt buộc'
        ];
    }
}

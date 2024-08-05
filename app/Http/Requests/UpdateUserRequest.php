<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        'name' => 'required|min:1|max:50',
        'type' => 'required|max:10'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường name là bắt buộc!!!!',
            'name.max' => 'Tối đa 50 ký tự',
            'name.min' => 'Tối thiểu 1 ký tự',
            'type' => 'Trường type là bắt buộc!!!!',
            'type.max' => 'Tối đa 10 ký tự!!!!',
        ];
    }
}

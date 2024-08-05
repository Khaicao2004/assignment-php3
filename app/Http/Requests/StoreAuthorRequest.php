<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
        'email' => 'required|email|unique:authors,email|max:255',
        'phone' => 'required|unique:authors,email|max:20',
        'address' => 'required|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường name là bắt buộc!!!!',
            'name.max' => 'Tối đa 50 ký tự',
            'name.min' => 'Tối thiểu 1 ký tự',
            'email' => 'Trường email là bắt buộc!!!!',
            'email.max' => 'Tối đa 255 ký tự',
            'email.unique' => 'Email đã tồn tại!!',
            'phone' => 'Trường phone là bắt buộc!!!!',
            'phone.max' => 'Tối đa 20 ký tự',
            'phone.unique' => 'Số điện thoại đã tồn tại!!',
            'address' => 'Trường address là bắt buộc!!!!',
        ];
    }
}

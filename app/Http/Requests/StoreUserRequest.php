<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        'email' => 'required|email|unique:users,email|max:255',
        'password' => 'required|confirmed',
        'type' => 'required|unique:users,type|max:10'
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
            'password.required' => 'Trường password là bắt buộc!!!!',
            'password.confirmed' => 'Trường password không trùng khớp!!!!',
            'type' => 'Trường type là bắt buộc!!!!',
            'type.max' => 'Tối đa 10 ký tự!!!!',
            'type.unique' => 'Type đã tồn tại!!!!',
        ];
    }
}

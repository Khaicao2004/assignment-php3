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
        $rules = [
            'name' => 'required|string|max:255',
            'sku' => 'required', 
            'overview' => 'required|string', 
            'content' => 'required|string', 

            'tags' => 'array|required',
            'tag.*' => 'integer|exists:tags,id',
            'photos' => 'array',
            'photos.*' => 'image|mimes:png,jpg|max:2048',
        ];
        if($this->has('author_id') && !empty($this->author_id)){
            $rules['author_id'] = 'required|exists:authors,id';
        }else{
            $rules['author'] = 'array|required_array_keys:name,address,phone,email';
            $rules['author.name'] = 'required|string|max:50';
            $rules['author.address'] = 'required|string';
            $rules['author.phone'] = 'required|unique:authors,phone|integer';
            $rules['author.email'] = 'required|email|unique:authors,email|string';
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường name là bắt buộc!!!!',
            'name.max' => 'Tối đa 50 ký tự',
            'name.min' => 'Tối thiểu 1 ký tự',
            'author_id.required' => 'Vui lòng chọn tác giả!!!!',
            'author.name.required' => 'Name là bắt buộc',
            'author.email.required' => 'Email là bắt buộc',
            'author.phone.required' => 'Phone là bắt buộc',
            'author.address.required' => 'Address là bắt buộc',
            'author.email.unique' => 'Email đã tồn tại!!',
            'tags.required' => 'Là bắt buộc'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'mật khẩu'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Bạn chưa nhập :attribute',
            'password.min' => 'Mật khẩu phải tối thiểu 8 kí tự',
            'email' => 'Email không đúng định dạng',
        ];
    }
}

<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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
            'color' => 'required',
            'size' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Hãy chọn :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'color' => 'màu sắc',
            'size' => 'kích cỡ'
        ];
    }
}

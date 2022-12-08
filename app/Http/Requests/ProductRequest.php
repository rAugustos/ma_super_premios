<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'images' => 'required',
            'name' => 'required|string|min:4|max:255',
            'price' => 'required|numeric|min:0.99',
            'buttons_value' => 'required|numeric|min:1',
            'share_price' => 'required|numeric|min:0.99',
            'share_lot_price' => 'required|numeric|min:0.99',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => 'required|string',
            'size' => 'required|numeric|min:1',
            'price_per_month' => 'required|numeric|min:0',
            'location' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,webp',
        ];
    }
}

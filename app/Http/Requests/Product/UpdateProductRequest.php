<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }


    private const PRODUCT = 'product';
    private const PRICE = 'price';
    private const DESCRIPTION = 'description';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            self::PRODUCT => 'required|string',
            self::DESCRIPTION => 'required|string',
            self::PRICE => 'required|numeric',
        ];
    }

    public function getProductName()
    {
        return $this->get(self::PRODUCT);
    }

    public function getProductPrice()
    {
        return $this->get(self::PRICE);
    }

    public function getProductDescription()
    {
        return $this->get(self::DESCRIPTION);
    }

}

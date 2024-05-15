<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    private const PRODUCTS = 'products';
    private const PRODUCT_ID = 'products.*.id';
    private const PRODUCT_QUANTITY = 'products.*.quantity';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            self::PRODUCTS => 'required|array',
            self::PRODUCT_ID => 'required|integer|exists:products,id',
            self::PRODUCT_QUANTITY => 'required|integer|min:1'
        ];
    }

    public function getProducts(): array
    {
        return $this->get(self::PRODUCTS);
    }

    public function getUserId(): int
    {
        return 1;//$this->user()->id;
    }
}

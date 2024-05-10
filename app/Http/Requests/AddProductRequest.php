<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
    private const IMAGE = 'image';
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
            self::IMAGE => 'required|image'
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

    public function getProductImage(): array|\Illuminate\Http\UploadedFile|null
    {
        return $this->file(self::IMAGE);
    }
}

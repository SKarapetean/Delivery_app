<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class IndexOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    private const PAGE = 'page';
    private const PER_PAGE = 'per_page';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            self::PAGE => 'nullable|numeric',
            self::PER_PAGE => 'nullable|numeric'
        ];
    }

    public function getPage(): ?int
    {
        return $this->query(self::PAGE);
    }

    public function getPerPage(): ?int
    {
        return $this->query(self::PER_PAGE);
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }
}

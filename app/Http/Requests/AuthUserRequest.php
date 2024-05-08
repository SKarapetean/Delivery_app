<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    private const AUTH_CODE = 'auth_code';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            self::AUTH_CODE => 'required|string',
        ];
    }

    public function getAuthCode(): string
    {
        return $this->get(self::AUTH_CODE);
    }
}

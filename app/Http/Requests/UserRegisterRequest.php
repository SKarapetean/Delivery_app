<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    private const FIRST_NAME = 'first_name';
    private const LAST_NAME = 'last_name';
    private const SURNAME = 'surname';
    private const ADDRESS = 'address';
    private const PHONE = 'phone';
    private const COMPANY_NAME = 'company_name';
    public function rules(): array
    {
        return [
            self::FIRST_NAME => 'required|string',
            self::LAST_NAME => 'required|string',
            self::SURNAME => 'required|string',
            self::ADDRESS => 'required|string',
            self::COMPANY_NAME => 'required|string',
            self::PHONE => 'required|regex:/^0\d{8}$/'
        ];
    }

    public function getPhone()
    {
        return $this->get(self::PHONE);
    }

    public function getSurname()
    {
        return $this->get(self::SURNAME);
    }

    public function getLastName()
    {
        return $this->get(self::LAST_NAME);
    }

    public function getFirstName()
    {
        return $this->get(self::FIRST_NAME);
    }

    public function getCompanyName()
    {
        return $this->get(self::COMPANY_NAME);
    }

    public function getAddress()
    {
        return $this->get(self::ADDRESS);
    }
}

<?php

namespace App\DTO;

use App\Http\Requests\User\UserRegisterRequest;
use Carbon\Carbon;

class UserRegisterDTO
{
    public $code;

    public function __construct(
        public $first_name,
        public $last_name,
        public $surname,
        public $address,
        public $phone,
        public $company_name,

    )
    {
    }


    public static function fromRequest(UserRegisterRequest $request)
    {
        return new self(
            first_name: $request->getFirstName(),
            last_name: $request->getLastName(),
            surname: $request->getSurname(),
            address: $request->getAddress(),
            phone: $request->getPhone(),
            company_name: $request->getCompanyName()
        );
    }

    public function setCode(int $code)
    {
        $this->code = $code;
    }

    public function toArray(): array
    {
        $now = Carbon::now();
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'surname' => $this->surname,
            'address' => $this->address,
            'phone' => $this->phone,
            'company_name' => $this->company_name,
            'auth_code' => $this->code,
            'created_at' => $now,
            'updated_at' => $now
        ];
    }

}

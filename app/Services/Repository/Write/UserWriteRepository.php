<?php

namespace App\Services\Repository\Write;

use App\DTO\UserRegisterDTO;
use App\Models\User;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function query()
    {
        return User::query();
    }

    public function updateUserAuthCode(User $user, string|null $code)
    {
        $user->auth_code = $code;
        $user->save();
    }

    public function registerUser(UserRegisterDTO $dto)
    {
        $user = User::fromDto($dto);
        return $user->save();
    }

}

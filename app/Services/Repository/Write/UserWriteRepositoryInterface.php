<?php

namespace App\Services\Repository\Write;

use App\DTO\UserRegisterDTO;
use App\Models\User;

interface UserWriteRepositoryInterface
{
    public function updateUserAuthCode(User $user, string|null $code);
    public function registerUser(UserRegisterDTO $dto);
}

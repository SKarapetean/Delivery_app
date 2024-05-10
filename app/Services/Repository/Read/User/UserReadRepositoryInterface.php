<?php

namespace App\Services\Repository\Read\User;

interface UserReadRepositoryInterface
{
    public function getUserByAuthCode(string $code);
    public function getAuthCodes();
}

<?php

namespace App\Services\Repository\Read;

interface UserReadRepositoryInterface
{
    public function getUserByAuthCode(string $code);
    public function getAuthCodes();
}

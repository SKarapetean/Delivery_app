<?php

namespace App\Services\Repository\Read;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserReadRepository implements UserReadRepositoryInterface
{
    private function query(): Builder
    {
        return User::query();
    }

    public function getUserByAuthCode(string $code)
    {
        return $this->query()
            ->where('auth_code', $code)
            ->first();
    }

    public function getAuthCodes()
    {
        return $this->query()
            ->whereNotNull('auth_code')
            ->get()
            ->pluck('auth_code')
            ->toArray();
    }
}

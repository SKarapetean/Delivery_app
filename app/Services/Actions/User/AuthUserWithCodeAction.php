<?php

namespace App\Services\Actions\User;

use App\Exceptions\AuthWithCodeException;
use App\Services\Repository\Read\User\UserReadRepositoryInterface;
use App\Services\Repository\Write\User\UserWriteRepositoryInterface;

class AuthUserWithCodeAction
{
    private UserReadRepositoryInterface $readRepository;
    private UserWriteRepositoryInterface $writeRepository;
    public function __construct(
        UserReadRepositoryInterface $readRepository,
        UserWriteRepositoryInterface $writeRepository
    )
    {
        $this->readRepository = $readRepository;
        $this->writeRepository = $writeRepository;
    }

    /**
     * @throws AuthWithCodeException
     */
    public function run(string $code)
    {
        $user = $this->readRepository->getUserByAuthCode($code);
        if (!$user) {
            throw new AuthWithCodeException('Invalid code', 401);
        }

        $this->writeRepository->updateUserAuthCode($user, null);

        return $user->createToken($code);
    }
}

<?php

namespace App\Services\Actions;

use App\DTO\UserRegisterDTO;
use App\Services\Repository\Read\UserReadRepositoryInterface;
use App\Services\Repository\Write\UserWriteRepositoryInterface;

class UserRegisterAction
{
    public function __construct(
        protected readonly UserWriteRepositoryInterface $writeRepository,
        protected readonly UserReadRepositoryInterface $readRepository
    )
    {}

    public function run(UserRegisterDTO $dto): int
    {
        $dto->setCode($this->generateAuthCode());
        $user = $this->writeRepository->registerUser($dto);

        if (!$user) {
            return -1;
        }
        return $dto->code;
    }

    private function generateAuthCode(): string
    {
        $authCodes = $this->readRepository->getAuthCodes();
        $randomNumberRange = 100_000;
        $randomNumber = random_int(0, $randomNumberRange);
        while(array_search($randomNumber, $authCodes)) {
            $randomNumber = random_int(0, $randomNumberRange);
        }
        return $randomNumber;
    }

}

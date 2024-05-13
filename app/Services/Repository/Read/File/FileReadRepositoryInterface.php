<?php

namespace App\Services\Repository\Read\File;

interface FileReadRepositoryInterface
{
    public function getFileById(int $fileId): ?object;
}

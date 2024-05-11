<?php

namespace App\Services\Repository\Write\FIle;

interface FileWriteRepositoryInterface
{
    public function add(string $path): int;
    public function getFileById(int $fileId): ?object;
    public function deleteFileById(int $fileId): void;
}

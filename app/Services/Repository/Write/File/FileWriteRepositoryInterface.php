<?php

namespace App\Services\Repository\Write\File;

interface FileWriteRepositoryInterface
{
    public function add(string $path): int;
    public function deleteFileById(int $fileId): void;
}

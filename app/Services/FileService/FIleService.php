<?php

namespace App\Services\FileService;

use App\Services\Repository\Write\FIle\FileWriteRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FIleService
{
    public function __construct(public FileWriteRepositoryInterface $writeRepository)
    {
    }

    public function addFile(UploadedFile $image): int
    {
        $path = Storage::putFile('public/Files', $image);
        if ($path) {
            return $this->writeRepository->add($path);
        }

        return -1;
    }
}
<?php

namespace App\Services\FileService;

use App\Services\Repository\Read\File\FileReadRepositoryInterface;
use App\Services\Repository\Write\File\FileWriteRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    private const PATH = 'public/Files';

    public function __construct(
        public FileWriteRepositoryInterface $writeRepository,
        public FileReadRepositoryInterface $readRepository)
    {
    }

    public function addFile(UploadedFile $image): int
    {
        $path = Storage::putFile(self::PATH, $image);
        if ($path) {
            $fileUrl = Storage::url($path);
            return $this->writeRepository->add($fileUrl);
        }

        return -1;
    }

    public function delete(int $fileId): void
    {
        $file = $this->readRepository->getFileById($fileId);
        if ($file) {
            $path = str_replace('storage', 'public', $file->path);
            Storage::delete($path);
            $this->writeRepository->deleteFileById($fileId);
        }
    }

}

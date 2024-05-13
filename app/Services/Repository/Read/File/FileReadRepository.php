<?php

namespace App\Services\Repository\Read\File;

use App\Models\File;
use Illuminate\Database\Eloquent\Builder;

class FileReadRepository implements FileReadRepositoryInterface
{
    private function query(): Builder
    {
        return File::query();
    }

    public function getFileById(int $fileId): ?object
    {
        return $this->query()->where('id', $fileId)->first();
    }

}

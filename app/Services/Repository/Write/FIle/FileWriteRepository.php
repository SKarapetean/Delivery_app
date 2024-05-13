<?php

namespace App\Services\Repository\Write\FIle;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class FileWriteRepository implements FileWriteRepositoryInterface
{
    private function query(): Builder
    {
        return File::query();
    }

    public function add(string $path): int
    {
        $now = Carbon::now();
        return $this->query()->insertGetId(['path' => $path, 'created_at' => $now, 'updated_at' => $now]);
    }

    public function deleteFileById(int $fileId): void
    {
        $this->query()->where('id', $fileId)->delete();
    }
}

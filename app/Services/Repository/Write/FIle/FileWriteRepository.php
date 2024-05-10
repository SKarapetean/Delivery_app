<?php

namespace App\Services\Repository\Write\FIle;

use App\Models\File;
use Carbon\Carbon;

class FileWriteRepository implements FileWriteRepositoryInterface
{
    private function query()
    {
        return File::query();
    }

    public function add(string $path): int
    {
        $now = Carbon::now();
        return $this->query()->insertGetId(['path' => $path, 'created_at' => $now, 'updated_at' => $now]);
    }
}

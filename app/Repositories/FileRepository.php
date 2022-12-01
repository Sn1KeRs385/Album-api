<?php

namespace App\Repositories;

use App\Models\User;
use Sn1KeRs385\FileUploader\App\Enums\FileStatus;
use Sn1KeRs385\FileUploader\App\Models\File;

class FileRepository
{
    public function __construct()
    {
    }

    public function paginateListForUser(User $user, int $perPage = 25): \Illuminate\Contracts\Pagination\Paginator
    {
        return File::query()
            ->where('owner_type', $user->getMorphClass())
            ->where('owner_id', $user->id)
            ->whereNotIn('status', [FileStatus::ERROR])
            ->with(['files'])
            ->simplePaginate($perPage);
    }
}

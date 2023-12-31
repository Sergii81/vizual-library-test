<?php

namespace App\Interfaces\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface extends RepositoryInterface
{
    public function getAllByPublisherId(int $publisherId): Collection;
    public function paginateAll(int $page, int $perPage): LengthAwarePaginator;
}

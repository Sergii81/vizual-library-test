<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface extends RepositoryInterface
{
    public function getAllByPublisherId(int $publisherId): Collection;
}

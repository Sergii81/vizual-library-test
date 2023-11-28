<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookRepository extends AbstractRepository implements BookRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new Book();
    }

    /**
     * @param int $publisherId
     * @return Collection
     */
    public function getAllByPublisherId(int $publisherId): Collection
    {
        return $this->getQuery()->where('user_id', '=', $publisherId)->get();
    }
}

<?php

namespace App\Actions\Book;

use App\Interfaces\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GetBookAction
{
    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function execute(int $id): ?Model
    {
        return $this->bookRepository->getById($id);
    }
}

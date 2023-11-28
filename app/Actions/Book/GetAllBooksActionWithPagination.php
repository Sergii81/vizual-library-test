<?php

namespace App\Actions\Book;

use App\Interfaces\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetAllBooksActionWithPagination
{
    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }


    public function execute(int $page, int $perPage)
    {
        return $this->bookRepository->paginateAll($page, $perPage);
    }
}

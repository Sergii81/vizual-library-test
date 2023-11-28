<?php

namespace App\Actions\Book;

use App\Interfaces\Repositories\BookRepositoryInterface;

class DeleteBookAction
{
    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }

    /**
     * @param $id
     * @return void
     */
    public function execute($id): void
    {
        $book = $this->bookRepository->getById($id);

        $book->authors()->detach();

        $this->bookRepository->delete($id);
    }
}

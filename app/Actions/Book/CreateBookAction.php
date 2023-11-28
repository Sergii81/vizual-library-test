<?php

namespace App\Actions\Book;

use App\Dto\CreateBookDto;
use App\Interfaces\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateBookAction
{
    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }

    /**
     * @param CreateBookDto $dto
     * @return Model
     */
    public function execute(CreateBookDto $dto): Model
    {
        $book = $this->bookRepository->create($dto->toArray());

        $book->authors()->sync($dto->getAuthors());

        return $book;
    }
}

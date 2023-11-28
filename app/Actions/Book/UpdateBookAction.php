<?php

namespace App\Actions\Book;

use App\Dto\UpdateBookDto;
use App\Interfaces\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateBookAction
{

    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }

    /**
     * @param int $id
     * @param UpdateBookDto $dto
     * @return Model|null
     */
    public function execute(int $id, UpdateBookDto $dto): ?Model
    {
        $book = $this->bookRepository->updateById($id, $dto->toArray());

        if (!empty($dto->getAuthors())) {
            $book->authors()->syncWithoutDetaching($dto->getAuthors());
        }

        return $book;
    }
}

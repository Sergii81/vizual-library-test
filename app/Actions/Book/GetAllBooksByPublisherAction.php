<?php

namespace App\Actions\Book;

use App\Interfaces\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetAllBooksByPublisherAction
{
    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        $publisherId = auth('sanctum')->user()->getAuthIdentifier();

        return $this->bookRepository->getAllByPublisherId($publisherId);
    }
}

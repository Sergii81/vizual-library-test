<?php

namespace App\Dto;

use App\Actions\Book\GetBookAction;
use App\Models\Book;
use Illuminate\Contracts\Container\BindingResolutionException;

class UpdateBookDto
{
    /**
     * @param string|null $title
     * @param array|null $authors
     * @param string|null $description
     */
    public function __construct(
        private int $user_id,
        private ?string $title,
        private ?array $authors,
        private ?string $description
    ) {
    }

    /**
     * @param $request
     * @return static
     */
    public static function fromRequest($request): static
    {
        /** @var Book $book */
        $book = Book::query()->where('id', '=', $request->id)->first();

        return new static(
            user_id: $book->user_id,
            title: !empty($request->title) ? $request->title : $book->title,
            authors: !empty($request->authors) ? $request->authors : $book->authors,
            description: !empty($request->description) ? $request->description : $book->description,
        );
    }

    /**
     * @return array|null
     */
    public function getAuthors(): ?array
    {
        return $this->authors;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

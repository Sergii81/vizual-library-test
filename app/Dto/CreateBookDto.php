<?php

namespace App\Dto;

class CreateBookDto
{

    public function __construct(
        private int $user_id,
        private string $title,
        private array $authors,
        private ?string $description
    ) {
    }

    public static function fromRequest($request)
    {
        return new static(
            user_id: auth('sanctum')->user()->getAuthIdentifier(),
            title: $request->title,
            authors: $request->authors,
            description: ! empty($request->description) ? $request->description : null
        );
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BookResource',
    title: 'BookResource',
    description: 'Book resource',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Title 1'),
        new OA\Property(property: 'description', type: 'string', example: 'Description 1'),
        new OA\Property(property: 'publisher', type: 'string', example: 'Publisher 1'),
        new OA\Property(property: 'authors', example: ['Author 1', 'Author 2'])
    ],
)]

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'publisher' => $this->user->name,
            'authors' => $this->authors->pluck('name')->toArray()
        ];
    }
}

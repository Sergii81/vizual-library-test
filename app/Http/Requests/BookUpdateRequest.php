<?php

namespace App\Http\Requests;

use App\Rules\BookPublisherRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BookUpdateRequest',
    title: 'BookUpdateRequest',
    description: 'Book Update Request',
    required: ['id'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Title'),
        new OA\Property(property: 'description', type: 'string', example: 'Description', nullable: true),
        new OA\Property(property: 'authors', type: 'integer', example: [1, 2])
    ],
)]

class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:books,id', new BookPublisherRule()],
            'title' => ['sometimes', 'string', 'nullable'],
            'description' => ['sometimes', 'string', 'nullable'],
            'authors' => ['sometimes', 'array', 'nullable'],
            'authors.*' => ['sometimes', 'exists:authors,id']
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('book')
        ]);
    }
}

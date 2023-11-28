<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BookCreateRequest',
    title: 'BookCreateRequest',
    description: 'Book Create Request',
    required: ['title', 'authors'],
    properties: [
        new OA\Property(property: 'title', type: 'string', example: 'Title'),
        new OA\Property(property: 'description', type: 'string', example: 'Description', nullable: true),
        new OA\Property(property: 'authors', type: 'integer', example: [1, 2])
    ],
)]
class BookCreateRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['sometimes', 'string', 'nullable'],
            'authors' => ['required', 'array'],
            'authors.*' => ['exists:authors,id']
        ];
    }
}

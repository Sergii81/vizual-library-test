<?php

namespace App\Http\Controllers;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\DeleteBookAction;
use App\Actions\Book\GetAllBooksByPublisherAction;
use App\Actions\Book\GetBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Dto\CreateBookDto;
use App\Dto\UpdateBookDto;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookDeleteRequest;
use App\Http\Requests\BookShowRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class BookController extends Controller
{
    /**
     * Index
     * @param GetAllBooksByPublisherAction $action
     * @return BookCollection
     */
    #[OA\Get(path: '/books', tags: ['books'])]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(ref: '#/components/schemas/BookCollection')
    )]
    public function index(GetAllBooksByPublisherAction $action): BookCollection
    {
        return BookCollection::make($action->execute());
    }

    /**
     * Create
     * @param BookCreateRequest $request
     * @param CreateBookAction $action
     * @return BookResource
     */
    #[OA\Post(path: '/books', tags: ['books'])]
    #[OA\RequestBody(content: new OA\JsonContent(ref: '#/components/schemas/BookCreateRequest'))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(
        ref: '#/components/schemas/BookResource'
    ))]
    public function create(BookCreateRequest $request, CreateBookAction $action): BookResource
    {
        $dto = CreateBookDto::fromRequest($request);

        return BookResource::make($action->execute($dto));
    }

    /**
     * Show
     * @param BookShowRequest $request
     * @param GetBookAction $action
     * @return BookResource
     */
    #[OA\Get(path: '/books/{book_id}', tags: ['books'])]
    #[OA\PathParameter(name: 'book_id', required: true)]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(ref: '#/components/schemas/BookResource')
    )]
    public function show(BookShowRequest $request, GetBookAction $action): BookResource
    {
        return BookResource::make($action->execute($request->id));
    }

    /**
     * Update
     * @param BookUpdateRequest $request
     * @param UpdateBookAction $action
     * @return BookResource
     */
    #[OA\Patch(path: '/books/{book_id}', tags: ['books'])]
    #[OA\PathParameter(name: 'book_id', required: true)]
    #[OA\RequestBody(content: new OA\JsonContent(ref: '#/components/schemas/BookUpdateRequest'))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(
        ref: '#/components/schemas/BookResource'
    ))]
    public function update(BookUpdateRequest $request, UpdateBookAction $action): BookResource
    {
        $dto = UpdateBookDto::fromRequest($request);

        return BookResource::make($action->execute($request->id, $dto));
    }

    /**
     * Delete
     * @param BookDeleteRequest $request
     * @param DeleteBookAction $action
     * @return JsonResponse
     */
    #[OA\Delete(path: '/books/delete/{book_id}', tags: ['books'])]
    #[OA\PathParameter(name: 'book_id', required: true)]
    #[OA\Response(response: 204, description: 'No content')]
    public function delete(BookDeleteRequest $request, DeleteBookAction $action): JsonResponse
    {
        $action->execute($request->id);

        return response()->json('', 204);
    }
}

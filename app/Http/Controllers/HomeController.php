<?php

namespace App\Http\Controllers;

use App\Actions\Book\GetAllBooksActionWithPagination;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @param GetAllBooksActionWithPagination $action
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(Request $request, GetAllBooksActionWithPagination $action): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $page = ! empty($request->page) ? $request->page : Book::PAGE;
        $perPage = ! empty($request->perPage) ? $request->perPage : Book::PER_PAGE;

        $books = $action->execute($page, $perPage);

        return view('index', ['books' => $books]);
    }
}

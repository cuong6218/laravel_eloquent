<?php

namespace App\Http\Controllers;

use App\Http\Services\BookService;
use App\Http\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BookController extends Controller
{
    protected $bookService;
    protected $typeService;
    public function __construct(BookService $bookService,
                                TypeService $typeService)
    {
        $this->bookService = $bookService;
        $this->typeService = $typeService;
    }
    public function showList()
    {
        $books = $this->bookService->getAll();
        return view('books.list-book', compact('books'));
    }
    public function showFormAdd()
    {
        $types = $this->typeService->getAll();
        return view('books.add-book', compact('types'));
    }
    public function addBook(Request $request)
    {
        $this->bookService->addBook($request);
        Session::flash('success', 'Add book success');
        return redirect()->route('books.showList');
    }
    public function deleteBook($id)
    {
        $this->bookService->deleteBook($id);
        return redirect()->route('books.showList');
    }
    public function showFormUpdate($id)
    {
        $types = $this->typeService->getAll();
        $book = $this->bookService->getBookById($id);
        return view('books.update-book', compact('book', 'types'));
    }
    public function updateBook(Request $request, $id)
    {
        $this->bookService->updateBook($request, $id);
        Session::flash('success', 'Update book success');
        return redirect()->route('books.showList');
    }
    public function searchBook(Request $request)
    {
        $books = $this->bookService->searchBook($request);
        return view('books.list-book', compact('books'));
    }
}

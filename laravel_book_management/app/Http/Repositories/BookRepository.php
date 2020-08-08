<?php


namespace App\Http\Repositories;

use App\Book;
use App\Type;
use Illuminate\Http\Request;

class BookRepository
{
    protected $book;
    protected $type;
    protected $typeRepository;
    function __construct(Book $book, Type $type, TypeRepository $typeRepository){
        $this->book = $book;
        $this->type = $type;
        $this->typeRepository = $typeRepository;
    }
    function getAll(){
        return $this->book->select('*')->orderBy('id', 'desc')->get();
    }
    function save($book){
        $book->save();
    }
    function delete($id){
        $this->book->destroy($id);
    }
    function getBookById($id){
        return $this->book->findOrFail($id);
    }
    function searchByName(Request $request){
        $keyword = $request->keyword;
        return Book::where('name', 'LIKE', '%'.$keyword.'%' )->get();
    }
    function searchByAuthor(Request $request){
        $keyword = $request->keyword;
        return Book::where('author', 'LIKE', '%'.$keyword.'%')->get();
    }
    function searchByPublisher(Request $request){
        $keyword = $request->keyword;
        return Book::where('publisher', 'LIKE', '%'.$keyword.'%')->get();
    }
    function searchByType(Request $request)
    {
        $type = $this->typeRepository->searchType($request);
        return Book::where('id', $type->id);
    }

}

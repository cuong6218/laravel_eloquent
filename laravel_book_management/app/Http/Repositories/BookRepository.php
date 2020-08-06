<?php


namespace App\Http\Repositories;

use App\Book;
use Illuminate\Http\Request;

class BookRepository
{
    protected $book;
    function __construct(Book $book){
        $this->book = $book;
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
//    function update(Request $request, $id){
//        $this->book->where('id', $id)
//            ->update(['name' => $request->name],
//                            ['author' => $request->author],
//                            ['publisher' => $request->publisher],
//                            ['amount' => $request->amount],
//                            ['image' => $request->image],
//                            ['price' => $request->price],
//                            ['desc' => $request->desc]);

//    }
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
}

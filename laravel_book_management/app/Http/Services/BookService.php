<?php


namespace App\Http\Services;

use App\Book;
use App\Http\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookService
{
    protected $bookRepository;
    function __construct(BookRepository $bookRepository){
        $this->bookRepository = $bookRepository;
    }
    function getAll(){
        return $this->bookRepository->getAll();
    }
    function addBook(Request $request){
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->amount = $request->amount;
        $book->price = $request->price;
        //upload file
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->desc = $request->desc;
        $this->bookRepository->save($book);
    }
    function deleteBook($id){
        $this->bookRepository->delete($id);
    }
    function getBookById($id){
        return $this->bookRepository->getBookById($id);
    }
    function updateBook(Request $request, $id){
        $book = $this->bookRepository->getBookById($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->amount = $request->amount;
        $book->price = $request->price;
        //update image
        if($request->hasFile('image')){
            // delete current image
            $currentImg = $book->image;
            if($currentImg){
                Storage::delete('/public/'.$currentImg);
            }
            //update new image
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->desc = $request->desc;
        $this->bookRepository->save($book);
//        return $this->bookRepository->update($request, $id);
    }
    function searchBook(Request $request){
        $option = $request->checkBook;
        switch ($option){
            case 'name':
                return $this->bookRepository->searchByName($request);
                break;
            case 'author':
                return $this->bookRepository->searchByAuthor($request);
                break;
            case 'publisher':
                return $this->bookRepository->searchByPublisher($request);
                break;
            default: return 'Book not found';
        }
    }
}

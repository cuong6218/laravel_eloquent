<?php


namespace App\Http\Services;


use App\Http\Repositories\ReaderRepository;
use App\Reader;
use Illuminate\Http\Request;

class ReaderService
{
    protected $readerRepository;
    function __construct(ReaderRepository $readerRepository)
    {
        $this->readerRepository = $readerRepository;
    }
    function getAll()
    {
        return $this->readerRepository->getAll();
    }
    function addReader(Request $request)
    {
        $reader = new Reader();
        $reader->name = $request->name;
        $reader->age = $request->age;
        $reader->phone = $request->phone;
        $reader->address = $request->address;
        $this->readerRepository->save($reader);
    }
    function deleteReader($id)
    {
        $this->readerRepository->delete($id);
    }
    function getReaderById($id)
    {
        return $this->readerRepository->getReaderById($id);
    }
    function updateReader(Request $request, $id)
    {
        $reader = $this->readerRepository->getReaderById($id);
        $reader->name = $request->name;
        $reader->age = $request->age;
        $reader->phone = $request->phone;
        $reader->address = $request->address;
        $this->readerRepository->save($reader);
    }
}

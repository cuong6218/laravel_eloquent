<?php


namespace App\Http\Repositories;


use App\Reader;

class ReaderRepository
{
    protected $reader;
    function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }
    function getAll()
    {
        return $this->reader->select('*')->orderBy('id', 'desc')->get();
    }
    function save($reader)
    {
        $reader->save();
    }
    function delete($id)
    {
        $this->reader->destroy($id);
    }
    function getReaderById($id)
    {
        return $this->reader->findOrFail($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Services\ReaderService;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    protected $readerService;
    function __construct(ReaderService $readerService)
    {
        $this->readerService = $readerService;
    }
    function showList()
    {
        $readers = $this->readerService->getAll();
        return view('readers.list-reader', compact('readers'));
    }
    function showFormAdd()
    {
        return view('readers.add-reader');
    }
    function addReader(Request $request)
    {
        $this->readerService->addReader($request);
        return redirect()->route('readers.showList');
    }
    function deleteReader($id)
    {
        $this->readerService->deleteReader($id);
        return redirect()->route('readers.showList');
    }
    function showFormUpdate($id)
    {
        $reader = $this->readerService->getReaderById($id);
        return view('readers.update-reader', compact('reader'));
    }
    function updateReader(Request $request, $id)
    {
        $this->readerService->updateReader($request, $id);
        return redirect()->route('readers.showList');
    }
}

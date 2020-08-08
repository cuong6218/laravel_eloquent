<?php

namespace App\Http\Controllers;

use App\Http\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $typeService;
    function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    public function showList()
    {
        $types = $this->typeService->getAll();
        return view('types.list-type', compact('types'));
    }
    public function showFormAdd()
    {
        return view('types.add-type');
    }
    public function addType(Request $request)
    {
        $this->typeService->addType($request);
        return redirect()->route('types.showList');
    }
    public function deleteType($id)
    {
        $this->typeService->deleteType($id);
        return redirect()->route('types.showList');
    }
    public function showFormUpdate($id)
    {
        $type = $this->typeService->getTypeById($id);
        return view('types.update-type', compact('type'));
    }
    public function updateType(Request $request, $id)
    {
        $this->typeService->updateType($request, $id);
        return redirect()->route('types.showList');
    }
}

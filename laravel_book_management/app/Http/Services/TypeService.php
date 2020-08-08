<?php


namespace App\Http\Services;

use App\Http\Repositories\TypeRepository;
use App\Type;
use Illuminate\Http\Request;

class TypeService
{
    protected $typeRepository;
    function __construct(TypeRepository $typeRepository){
        $this->typeRepository = $typeRepository;
    }
    function getAll(){
        return $this->typeRepository->getAll();
    }
    function addType(Request $request)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->desc = $request->desc;
        $this->typeRepository->save($type);
    }
    function deleteType($id)
    {
        $this->typeRepository->delete($id);
    }
    function getTypeById($id)
    {
        return $this->typeRepository->getTypeById($id);
    }
    function updateType(Request $request, $id)
    {
        $type = $this->typeRepository->getTypeById($id);
        $type->name = $request->name;
        $type->desc = $request->desc;
        $this->typeRepository->save($type);
    }
}

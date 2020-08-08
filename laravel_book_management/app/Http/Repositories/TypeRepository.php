<?php


namespace App\Http\Repositories;
use App\Type;
use Illuminate\Http\Request;

class TypeRepository
{
    protected $type;
    function __construct(Type $type)
    {
        $this->type = $type;
    }
    function getAll()
    {
        return $this->type->select('*')->orderBy('id', 'desc')->get();
    }
    function save($type)
    {
        $type->save();
    }
    function delete($id)
    {
        $this->type->destroy($id);
    }
    function getTypeById($id)
    {
        return $this->type->findOrFail($id);
    }
    function searchType(Request $request)
    {
        $keyword = $request->keyword;
        return Type::where('name', 'LIKE', '%'.$keyword.'%');
    }
}

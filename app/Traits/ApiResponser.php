<?php 

namespace App\Traits;

use Collator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait ApiResponser
{
    private function successResponse($data,$code)
    {
        return response()->json($data,$code);
    }
    protected function errorResponse($message,$code)
    {
        return response()->json(['error'=>$message,'code'=>$code],$code);
    }
    protected function showAll(Collection $collection, $code=200)
    {
            $collection=$this->sortData($collection);
            $collection=$this->paginate($collection);
            return $this->successResponse(['data'=>$collection],$code);
    }
    protected function showOne(Model $instance,$code=200)
    {
        return $this->successResponse(['data'=>$instance],$code); 
    }
    protected function sortData(Collection $collection)
    {
        if(request()->has('sort_by')){
            $attribute=request()->sort_by;
            $collection=$collection->sortBy->{$attribute};
        }
        return $collection;
    }
    protected function paginate(Collection $collection)
    {
        $page=LengthAwarePaginator::resolveCurrentPage();
         $perPage=10;
         $results=$collection->slice(($page-1)*$perPage,$perPage)->values();
         $paginated=new LengthAwarePaginator($results,$collection->count(),$perPage,$page,[
            'path'=>LengthAwarePaginator::resolveCurrentPath(),
         ]);
         $paginated->appends(request()->all());
         return $paginated;  
    }
   
}

?>
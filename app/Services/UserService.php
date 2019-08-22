<?php
namespace App\Services;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\User;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class UserService{

    public static function ajaxPaginate(Request $request)
    {
        return User::where(function ($query) use ($request){
            if($request->status)
            {
                $query->where('status', $request->status);
            }
            if($request->genre)
            {
                $query->where('genre', $request->genre);
            }
            if($request->type)
            {
                $query->where('type', $request->type);
            }
            if($request->age_min || $request->age_max )
            {
                $query->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(date_birth)))  >= ?',[$request->age_min ?? 0]);
                $query->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(date_birth)))  <= ?',[$request->age_max ?? 100]);
            }
        })->paginate(6);
    }


    public static function ajaxDatatable(Request $request)
    {
        return User::where(function ($query) use ($request){
            if($request->status)
            {
                $query->where('status', $request->status);
            }
            if($request->genre)
            {
                $query->where('genre', $request->genre);
            }
            if($request->type)
            {
                $query->where('type', $request->type);
            }
            if($request->age_min || $request->age_max )
            {
                $query->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(date_birth)))  >= ?',[$request->age_min ?? 0]);
                $query->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(date_birth)))  <= ?',[$request->age_max ?? 100]);
            }
        })->get();
    }


    public static function users()
    {
        return User::all();
    }

    public static function vue(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        $query = User::dataTableQuery('name', $orderBy, '');
        $data = $query->where(function ($query) use ($request){
            if($request->search)
            {
                $query->orWhere('name','LIKE', '%'.$request->search.'%')
                ->orWhereRaw(" 
                    (CASE WHEN genre = 'MALE' THEN 'masculino' LIKE '%".$request->search."%'
                    WHEN genre = 'FEMALE' THEN 'feminino' LIKE '%".$request->search."%'
                    ELSE 'outro' LIKE '%".$request->search."%' END)
                ")
                ->orWhereRaw(" 
                    (CASE WHEN `type` = 'MASTER' THEN 'administrador' LIKE '%".$request->search."%'
                    WHEN `type` = 'ADMIN' THEN 'gerente' LIKE '%".$request->search."%'
                    ELSE 'cliente' LIKE '%".$request->search."%' END)
                ")
                ->orWhereRaw(" 
                    (CASE WHEN `status` = 'ACTIVE' THEN 'ativo' LIKE '%".$request->search."%'
                    WHEN `status` = 'INACTIVE' THEN 'inativo' LIKE '".$request->search."%'
                    ELSE 'desabilitado' LIKE '%".$request->search."%' END)
                ");
            }
            if($request->status)
            {
                $query->where('status', $request->status);
            }
            if($request->genre)
            {
                $query->where('genre', $request->genre);
            }
            if($request->type)
            {
                $query->where('type', $request->type);
            }
            if($request->age_min || $request->age_max )
            {
                $query->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(date_birth)))  >= ?',[$request->age_min ?? 0]);
                $query->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(date_birth)))  <= ?',[$request->age_max ?? 100]);
            }
        })->paginate($length);
        return new DataTableCollectionResource($data);
    }
}

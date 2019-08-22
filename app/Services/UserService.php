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
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        $query = User::dataTableQuery($column, $orderBy, $searchValue);
        $data = $query->paginate($length);
        return new DataTableCollectionResource($data);
    }
}

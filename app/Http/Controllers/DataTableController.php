<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use DataTables;
class DataTableController extends Controller
{
    public function lista(Request $request)
    {

        if ($request->ajax()) {
            $users = UserService::ajaxDatatable($request);
            return Datatables::of($users)
	            ->addColumn('name', function($row){
	                return $row->name ?? '';
	            })
	            ->addColumn('status', function($row){
	                return $row->status_txt ?? '';
	            })
	            ->addColumn('tipo', function($row){
	                return $row->tipo ?? '';
	            })
                ->addColumn('idade', function($row){
                    return $row->idade ?? '';
                })
                ->addColumn('genero', function($row){
                    return $row->genero ?? '';
                })
	            ->addColumn('action', function($row){
	                   $btn = '<a href="#" class="edit btn btn-primary btn-sm">Pagina</a>';
	                    return $btn;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
        }
        return view('paginacao-datatable-ajax',
            [
                
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
class PaginateController extends Controller
{
    public function lista(Request $request){
        if ($request->ajax()) {
            return view('paginate-table-load',
                [
                    'users' => UserService::ajaxPaginate($request)
                ]
            );
        }
        return view('paginate-table',
            [
                'users' => UserService::ajaxPaginate($request)
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
class DataTableVueController extends Controller
{
    public function lista(Request $request)
    {
        return view('paginacao-vue',
            [
                
            ]
        );
        
    }

    public function ajax(Request $request){
        return UserService::vue($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
class PaginacaoSimplesController extends Controller
{
    public function lista()
    {
        return view('paginacao-simples',
            [
                'users' => UserService::users(),
            ]
        );
    }
}

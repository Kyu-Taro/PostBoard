<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function postData($id)
    {
        $data = Board::find($id);

        return [
            'data' => $data
        ];
    }
}

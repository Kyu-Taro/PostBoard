<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;;
use App\User;

class MeController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function me(Request $request)
    {
        return [
            'user' => Auth::user(),
        ];
    }

    public function logout()
    {
        Auth::logout();

        return response('',200);
    }

    public function del($id)
    {
        User::find($id)->delete();

        return response('',200);
    }
}

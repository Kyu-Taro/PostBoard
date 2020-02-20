<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;;
use App\Board;

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

        return [
            'success' => true
        ];
    }
}

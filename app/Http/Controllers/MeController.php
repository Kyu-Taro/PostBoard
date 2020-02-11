<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;;

class MeController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function index(Request $request)
    {
        return [
            'success' => true,
            'data' => Auth::user(),
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

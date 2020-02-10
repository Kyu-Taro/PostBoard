<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuht;

class MeController extends Controller
{
    protected $auth;

    public function __construct($auth)
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
        auth()->logout();

        return [
            'success' => true
        ];
    }
}

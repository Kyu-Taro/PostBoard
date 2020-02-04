<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);

            return [
                'success' => false,
                'errors' => "You ve been locked out"
            ];
        }

        $this->incrementLoginAttempts($request);

        try{
            if(!$token = $this->auth->attempt($request->only('email', 'password'))){
                return [
                    'success' => false,
                    'states' => 422,
                    'errors' => [
                        'email' => [
                            "Invalid email address or password"
                        ]
                    ]
                ];
            }
        }catch(JWTException $e){
            return [
                'success' => false,
                'states' => 422,
                'errors' => [
                    'email' => [
                        "Invalid email address or password"
                    ]
                ]
            ];
        }

        return [
            'success' => true,
            'data' => $request->user(),
            'token' => $token,
            'states' => 200
        ];
    }
}

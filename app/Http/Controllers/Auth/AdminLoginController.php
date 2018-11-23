<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AdminLoginController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function login(Request $request)
    {

        $this->validateLogin($request);


        if ($this->attemptLogin($request)) {

            Auth::guard('web')->logout();
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

 
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

 
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended(route('admin'));
    }

    protected function authenticated(Request $request, $user)
    {
        //
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }


    public function username()
    {
        return 'name';
    }



    protected function guard()
    {
        return Auth::guard('admin');
    }
}

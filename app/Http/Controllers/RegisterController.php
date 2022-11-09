<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    use AuthenticatesUsers;

    // protected $redirectTo = '/admin/home';
    protected $redirectTo = '/dashboard';


    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
     return Auth::guard('staff');
    }
    public function showLoginForm()
    {
        return view('auth2.login');
    }
}





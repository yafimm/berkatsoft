<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm(Request $request  )
    {
        if(!$request->session()->exists('link'))
        {
            $request->session()->put('link', url()->previous());
        }
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if(\Auth::user()->isAdmin()){
            return redirect()->route('admin.dashboard');
        }

        if($request->session()->exists('link') && $request->session()->get('link') != url('login'))
        {
            return redirect($request->session()->pull('link'));
        }

        return redirect('/');
    }
}

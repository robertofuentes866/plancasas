<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/AdminForms';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginAdmin() {
        return view('auth/loginAdmin');
    }

    public function loginAdmin(Request $request ){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credenciales = $request->only(['email','password']);
        if (Auth::guard('admin')->attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->intended('/AdminForms');

        }
        return redirect('/loginAdmin')->withErrors(['errorCredencial'=>'Intente con otros parametros']);
    }

    public function logOutAdmin() {
        Auth::guard('admin')->logout();
        return redirect('/AdminForms');
    }
}

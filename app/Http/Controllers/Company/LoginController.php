<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('company.login.login');
    }

    public function postLogin(Request $request)
    {
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
		]);

	    $credentials = ['email' => $request['email'], 'password' => $request['password']];

	    if ($this->guard()->attempt($credentials)) {
		    return redirect()->intended(route('company.dashboard'));
	    } else {
			return redirect()->route('company.login')->with(['error' => 'Invalid email and/or password.']);
	    }
    }

    public function logout()
    {
    	$this->guard()->logout();
	    return redirect()->route('home');
    }

    public function dashboard()
    {
		return view('company.login.dashboard');
    }

    private function guard()
    {
        return Auth::guard('companies');
    }
}

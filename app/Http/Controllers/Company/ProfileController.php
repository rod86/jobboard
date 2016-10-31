<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class ProfileController extends Controller
{
    public function getRegister()
    {
        return view('company.profile.register');
    }

    public function postRegister(Request $request)
    {
		$this->validate($request, [
			'name' => 'required|max:100',
			'email' => 'required|email|unique:companies',
			'password' => 'required|min:8|confirmed',
			'password_confirmation' => 'required|min:8'
		]);

	    $company = new Company();
	    $company->name = $request['name'];
	    $company->email = $request['email'];
	    $company->password = bcrypt($request['password']);
	    $company->save();

	    return redirect()->route('company.profile.register')->with(['success' => 'You have been registered.']);
    }
}

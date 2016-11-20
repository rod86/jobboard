<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;


class AccountController extends Controller
{
    public function getEditAccount()
    {
        return view('company.account.edit');
    }
}

<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public function getEditProfile()
    {
        return view('company.profile.edit');
    }
}

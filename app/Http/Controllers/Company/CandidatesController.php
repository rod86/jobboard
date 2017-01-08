<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;


class CandidatesController extends Controller
{
    public function index()
    {
	    $userId = Auth::user()->id;

	    // fetch candidates where company_id is $user id (left join)

	    $candidates = Candidate::all();

        return view('company.candidates.index', ['candidates' => $candidates]);
    }
}

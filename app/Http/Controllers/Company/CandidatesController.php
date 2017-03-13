<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;


class CandidatesController extends Controller
{
    public function index($jobId)
    {
	    $userId = Auth::user()->id;

	    $candidates = Candidate::query()
		    ->whereHas('job', function ($query) use ($userId) {
				$query->where('company_id', $userId);
		    })
		    ->where('job_id', $jobId)
		    ->get();

        return view('company.candidates.index', ['candidates' => $candidates]);
    }
}

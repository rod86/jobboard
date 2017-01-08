<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;


class JobsController extends Controller
{
    public function index()
    {
    	$jobs = Job::orderBy('updated_at', 'desc')->get();

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function view($jobId)
    {
    	$job = Job::findOrFail($jobId);

    	return view('jobs.view', ['job' => $job]);
    }

    public function viewCompany($companyId)
    {
	    $company = Company::findOrFail($companyId);

	    return view('jobs.company', ['company' => $company]);
    }

    public function applyJob($jobId, Request $request)
    {
	    $this->validate($request, [
	    	'name' => 'required',
		    'email' => 'required',
		    'resume' => 'required|mimes:doc,pdf|max:1000',
		    'eligibility' => 'required'
	    ]);

	    $email = $request->get('email');

	    // check if user has applied before (email / job_id)
	    $entry = Candidate::where('email', $email)
		    ->where('job_id', $jobId)
	        ->first();

	    if ($entry) {
		    return redirect()->route('job.view', ['jobId' => $jobId])
		                     ->with(['error' => 'You applied this role before.']);
	    }

	    // Save CV
	    $resume = $request->file('resume');
	    $resumeFileName = '';
	    if ($resume) {
		    $destinationPath = storage_path('app/public/resumes');
		    $resumeFileName = $resume->getClientOriginalName();
		    $resume->move($destinationPath, $resumeFileName);
	    }

	    // Add applicant
	    $candidate = new Candidate();
	    $candidate->job_id = $jobId;
	    $candidate->name = $request->get('name');
	    $candidate->email = $email;
	    $candidate->phone = $request->get('phone');
		$candidate->resume = $resumeFileName;
	    $candidate->save();

	    return redirect()->route('job.view', ['jobId' => $jobId])
	                     ->with(['success' => 'You have applied successfully.']);
    }
}

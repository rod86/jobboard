<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required',
			'resume' => 'required|mimes:doc,pdf|max:1000',
			'eligibility' => 'required'
		],[
			'eligibility.required' => 'You must be eligible to work in the role\'s country'
		]);

		if ($validator->fails())
		{
			return response()->json([
				'success' => false,
				'errors' => $validator->errors()
			]);
		}

		// Check if user has applied the role before
		$email = $request->get('email');

		$entry = Candidate::where('email', $email)
		                  ->where('job_id', $jobId)
		                  ->first();

		if ($entry) {
			return response()->json([
				'success' => false,
				'errors' => ['You applied this role before']
			]);
		}

		// Save CV
		$resume = $request->file('resume');
		$resumeFileName = '';
		if ($resume) {
			$resumeFileName = $resume->getClientOriginalName();
			Storage::disk('local')->put('public/resumes/' . $resumeFileName, File::get($resume));
		}

		// Add applicant
		$candidate = new Candidate();
		$candidate->job_id = $jobId;
		$candidate->name = $request->get('name');
		$candidate->email = $email;
		$candidate->phone = $request->get('phone');
		$candidate->resume = $resumeFileName;
		$candidate->save();

		return response()->json([
			'success' => true,
			'message' => 'Your application has been sent successfully.'
		]);
	}
}

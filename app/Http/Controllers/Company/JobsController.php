<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function index()
    {
    	$userId = Auth::user()->id;

	    $jobs = Job::where('company_id', $userId)
		    ->orderBy('created_at', 'desc')->get();

        return view('company.jobs.index', ['jobs' => $jobs]);
    }

    public function getAddJob()
    {
    	$types = Job::types();
	    $countries = Country::orderBy('name', 'asc')->get();

		return view('company.jobs.add', [
			'types' => $types,
			'countries' => $countries
		]);
    }

	public function postAddJob(Request $request)
	{
		$userId = Auth::user()->id;

		$this->validate($request, [
			'title' => 'required|max:100',
			'location' => 'required|max:100',
			'country' => 'required',
			'type' => 'required',
			'description' => 'required'
		]);

		$job = new Job();
		$job->company_id = $userId;
		$job->title = $request['title'];
		$job->location = $request['location'];
		$job->country_id = $request['country'];
		$job->type = $request['type'];
		$job->salary = $request['salary'];
		$job->description = $request['description'];
		$job->save();

		return redirect()->route('company.jobs.list')
		                 ->with(['success' => 'Job added successfully.']);
	}

	public function getEditJob($jobId)
	{
		$job = Job::findOrFail($jobId);
		$types = Job::types();
		$countries = Country::orderBy('name', 'asc')->get();

		return view('company.jobs.edit', [
			'job' => $job,
			'types' => $types,
			'countries' => $countries
		]);
	}

	public function postEditJob(Request $request, $jobId)
	{
		$this->validate($request, [
			'title' => 'required|max:100',
			'location' => 'required|max:100',
			'country' => 'required',
			'type' => 'required',
			'description' => 'required'
		]);

		$job = Job::Find($jobId);
		$job->title = $request['title'];
		$job->location = $request['location'];
		$job->country_id = $request['country'];
		$job->type = $request['type'];
		$job->salary = $request['salary'];
		$job->description = $request['description'];
		$job->update();

		return redirect()->route('company.jobs.list')
		                 ->with(['success' => 'Job updated successfully.']);
	}

	public function deleteJob($jobId)
	{
		$job =  Job::find($jobId);
		$job->delete();

		return redirect()->route('company.jobs.list')
		                 ->with(['success' => 'Job deleted successfully.']);
	}
}

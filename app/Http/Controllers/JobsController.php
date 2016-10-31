<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
//use Illuminate\Http\Request;

use App\Models\Job;

class JobsController extends Controller
{
    public function index()
    {
    	$jobs = Job::orderBy('updated_at', 'desc')->get();

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function view($jobId)
    {
    	$job = Job::find($jobId);

	    if (!$job)
	    	abort(404);

    	return view('jobs.view', ['job' => $job]);
    }
}

<?php

namespace App\Http\Controllers;

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
    	$job = Job::findOrFail($jobId);

    	return view('jobs.view', ['job' => $job]);
    }
}

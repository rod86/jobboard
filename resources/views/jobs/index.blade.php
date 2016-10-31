@extends('layouts.default')

@section('content')
    <h1>Latest Jobs</h1>

    <div class="jobs-list">
        @foreach($jobs as $job)
        <div class="panel panel-default">
            <div class="panel-body">
                <h4><a href="{{ route('job.view', ['jobId'=>$job->id]) }}">{{ $job->title }}</a></h4>
                <div class="row">
                    <div class="col-md-6">{{ $job->company->name }}</div>
                    <div class="col-md-6">{{ $job->location }}</div>
                </div>
                <p class="text-muted">Posted on {{ $job->updated_at->format('d/m/Y') }} <span class="separator"></span> 33 applications</p>
            </div>
        </div>
        @endforeach
    </div>

@endsection
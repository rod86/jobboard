@extends('layouts.dashboard')

@section('title', 'My Jobs')

@section('content')
    <h1>My Jobs</h1>
    <p>
        <a href="{{ route('company.jobs.add') }}" class="btn btn-success" role="button" title="Edit job">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Job
        </a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Posted Date</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Country</th>
                    <th>Type</th>
                    <th>Salary</th>
                    <th>Applicants</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->created_at->format('d/m/Y') }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->location }}</td>
                    <td>{{ $job->country->name }}</td>
                    <td>{{ $job->type }}</td>
                    <td>{{ $job->salary }}</td>
                    <td>{{ $job->candidates->count() }}</td>
                    <td>
                        <a href="{{ route('company.jobs.edit', ['id' => $job->id]) }}" class="btn btn-md btn-default" role="button" title="Edit job">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('company.candidates', ['jobId' => $job->id]) }}" class="btn btn-md btn-default" role="button" title="View applicants">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                        <form action="{{ route('company.jobs.delete', ['id'=>$job->id]) }}" method="POST" class="delete">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button class="btn btn-md btn-danger" type="submit">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
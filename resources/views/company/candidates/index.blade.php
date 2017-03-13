@extends('layouts.dashboard')

@section('title', 'Candidates')

@section('content')
    <h1>Candidates</h1>
    <div class="table-responsive">
        @if ($candidates->count())
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Posted Date</th>
                <th>Job</th>
                <th>Name</th>
                <th>Email</th>
                <th>CV</th>
            </tr>
            </thead>
            <tbody>
            @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->created_at->format('d/m/Y') }}</td>
                    <td>{{ $candidate->job->title }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>
                        <a href="{{ asset('storage/resumes/' . $candidate->resume) }}" target="_blank">{{ $candidate->resume }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <p class="text-center">No entries found</p>
        @endif
    </div>
@endsection
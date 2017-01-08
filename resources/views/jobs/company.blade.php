@extends('layouts.default')

@section('title', $company->name)

@section('content')
    <h1>{{ $company->name }}</h1>

    <div class="row">
        <div class="col-md-6 col-sm-push-6">
            @if($company->logo)
                <img src="{{ asset('storage/companies/' . $company->logo) }}" alt="{{ $company->name }}">
            @endif
        </div>
        <div class="col-md-6 col-sm-pull-6">
            <ul class="list-unstyled details-list">
                <li>
                <span>
                    <i class="fa fa-industry" aria-hidden="true"></i> Industry
                </span>
                    {{ $company->industry->title }}
                </li>
                <li>
                <span>
                    <i class="fa fa-users" aria-hidden="true"></i> Company Size
                </span>
                    {{ $company->size->title }}
                </li>
                @if ($company->website)
                    <li>
                <span>
                    <i class="fa fa-globe" aria-hidden="true"></i> Website
                </span>
                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                    </li>
                @endif
            </ul>

            <div class="description">
                {{ $company->description }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Jobs</h2>

            @if ($company->jobs)
            <table class="table">
                <thead>
                    <tr>
                        <th>Job</th>
                        <th>Location</th>
                        <th>Posted On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($company->jobs as $job)
                        <tr>
                            <td>
                                <a href="{{ route('job.view', ['jobId'=>$job->id]) }}">{{ $job->title }}</a>
                            </td>
                            <td>{{ $job->location }}</td>
                            <td>{{ $job->updated_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-center">
                    No Jobs Available
                </p>
            @endif
        </div>
    </div>

@endsection
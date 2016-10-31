@extends('layouts.default')

@section('title', $job->title)

@section('content')
    <div class="job-view">
        <h1>{{ $job->title }} <small>at {{$job->company->name }}</small></h1>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-push-8 details">
                <dl class="dl-horizontal">
                    <dt>Location</dt>
                    <dd>{{ $job->location }}</dd>
                    <dt>Type</dt>
                    <dd>{{ $job->type }}</dd>
                    <dt>Salary</dt>
                    <dd>{{ $job->salary }}</dd>
                </dl>

                <div class="text-center" id="apply-btn">
                    <a href="#" class="btn btn-primary btn-lg" role="button">Apply</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-pull-4 description">
                <b>Company</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat, massa et laoreet scelerisque, massa mauris scelerisque tellus, vel luctus lectus arcu eget neque. Sed volutpat commodo augue, quis cursus ligula aliquet in. Morbi vehicula vitae sem condimentum pulvinar. Mauris sollicitudin est in tincidunt bibendum. Pellentesque at libero ante. Aliquam erat volutpat. Praesent sollicitudin at nunc eget tincidunt. Nam vitae elit at libero efficitur vulputate. Suspendisse eu rutrum eros. Nulla tincidunt tristique sem, vitae egestas eros semper at.</p>
                <b>What we are looking for</b>
                <p>Morbi ligula sapien, cursus vel viverra sed, elementum sed neque. Fusce vel mauris venenatis, luctus est nec, pharetra nunc. In faucibus aliquam pulvinar. Nunc pellentesque turpis elit, non posuere leo tempor sed. Pellentesque placerat odio sit amet nibh fermentum egestas et vitae ligula.</p>

                <b>Skills</b>
                <ul>
                    <li>Net</li>
                    <li>Version Control</li>
                    <li>Windows Server Administration</li>
                    <li>Hosting management</li>
                </ul>
            </div>
        </div>
    </div>

@endsection
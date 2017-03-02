@extends('layouts.default')

@section('title', $job->title)

@section('content')
    <div class="job-view">
        <h1>{{ $job->title }}</h1>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-push-8 company-box">
                <a href="{{ route('job.viewcompany', ['companyId' => $job->company->id]) }}" class="thumbnail">
                    @if ($job->company->logo)
                    <img src="{{ asset('storage/companies/' . $job->company->logo) }}" alt="{{ $job->company->name }}" class="img-responsive">
                    @endif
                    <h3>{{ $job->company->name }}</h3>
                </a>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-pull-4 details">
                <ul class="list-unstyled details-list">
                    <li>
                        <span>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> Location
                        </span>
                        {{ $job->location }}, {{ $job->country->name }}
                    </li>
                    <li>
                        <span>
                            <i class="fa fa-suitcase" aria-hidden="true"></i> Type
                        </span>
                        {{ $job->type }}
                    </li>
                    <li>
                        <span>
                            <i class="fa fa-money" aria-hidden="true"></i> Salary
                        </span>
                        {{ $job->salary }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $job->description }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-job-application">
                    Apply
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Job Application -->
    <div class="modal fade" id="modal-job-application" tabindex="-1" role="dialog" aria-labelledby="modalApplicationLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('job.apply', ['jobId' => $job->id]) }}" method="post" enctype="multipart/form-data" id="job-apply-form" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalApplicationLabel">Apply to {{ $job->title }}</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger hidden" role="alert">
                            Error
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ Request::old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email *</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ Request::old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ Request::old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resume" class="col-sm-2 control-label">CV *</label>
                            <div class="col-sm-10">
                                <input type="file" id="resume" name="resume">
                                <p class="help-block">
                                    <small>Extensions: pdf and doc, Max size: 1 MB</small>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="eligibility"> I am eligible to work in {{ $job->country->name }}.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" name="apply" class="btn btn-primary">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
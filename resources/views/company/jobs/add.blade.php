@extends('layouts.dashboard')

@section('title', 'Add Job')

@section('content')
    <h1>Add Job</h1>

    @include('company.jobs.job_form', ['action' => route('company.jobs.add'), 'submitButtonText' => 'Add Job'])
@endsection
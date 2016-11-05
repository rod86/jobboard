@extends('layouts.dashboard')

@section('title', 'Edit Job')

@section('content')
    <h1>Edit Job</h1>


    @include('company.jobs.job_form', [
        'action' => route('company.jobs.edit', ['id'=>$job->id]),
        'submitButtonText' => 'Update Job'
        ])

@endsection
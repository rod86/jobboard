@extends('layouts.default')

@section('content')
    <h1>Register Company</h1>

    <p>You have been registered successfully.</p>
    <p>Now you can login <a href="{{ route('company.login') }}">here</a></p>
@endsection
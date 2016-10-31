@extends('layouts.default')

@section('content')
    <h1>Register Company</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        There are some validation errors.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('company.register') }}">
        <input type="hidden" name="_token" value="{{ Session::token() }}">

        <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ Request::old('name') }}">
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ Request::old('email') }}">
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error':'' }}">
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-success">Register</button>
    </form>
@endsection
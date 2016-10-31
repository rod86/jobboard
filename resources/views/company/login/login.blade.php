@extends('layouts.default')

@section('content')
    <h1>Sign In Company</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            There are some validation errors.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif

    <form method="post" action="{{ route('company.login') }}">
        <input type="hidden" name="_token" value="{{ Session::token() }}">

        <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ Request::old('email') }}">
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-success">Sign In</button>
    </form>
    <br>
    <p>
        You don't have an account? <a href="{{ route('company.register') }}">Register</a>
    </p>
@endsection
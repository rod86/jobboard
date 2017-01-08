@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    @include('includes.errors')

    <form method="post" action="{{ route('company.profile') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ Session::token() }}">

        <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
            <label for="name">Name <small>*</small></label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="form-group">
            <label for="name">Logo</label>
            
            @if ($user->logo)
                <div class="row file" id="file-logo">
                    <img src="{{ asset('storage/companies/' . $user->logo) }}" >
                    <button type="button" class="btn btn-xs btn-danger">Delete</button>
                </div>
            @endif    
            
            <input type="file" id="logo" name="logo">
            <p class="help-block">
                <small>Extensions: png,gif and jpeg, Max size: 1 MB</small>
            </p>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="10">{{ old('description', $user->description) }}</textarea>
        </div>

        <div class="form-group {{ $errors->has('company_industry') ? 'has-error':'' }}">
            <label for="company_industry">Industry <small>*</small></label>
            <select class="form-control" name="company_industry" id="company_industry">
                <option>-</option>
                @foreach($companyIndustries as $industry)
                    <option value="{{ $industry->id }}" {{ old('company_industry', $user->company_industry_id) == $industry->id ? 'selected=selected':'' }}>{{ $industry->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group {{ $errors->has('company_size') ? 'has-error':'' }}">
            <label for="company_size">Company Size <small>*</small></label>
            <select class="form-control" name="company_size" id="company_size">
                <option>-</option>
                @foreach($companySizes as $size)
                    <option value="{{ $size->id }}" {{ old('company_size', $user->company_size_id) == $size->id ?'selected=selected':'' }}>{{ $size->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" value="{{ old('website', $user->website) }}">
        </div>

        <p>
            <small>Fields with * are mandatory</small>
        </p>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // confirm delete entry on delete entry
        $('#file-logo button').click(function () {
            if (confirm('Are you sure to delete this file?')) {
                $.post('{{ route('company.profile.deleteFile') }}', { _token: '{{ Session::token() }}'}, function (response) {
                    if (response == 'ok') {
                        $('#file-logo').remove();
                    }
                });
            }
        })
    });
</script>
@endpush
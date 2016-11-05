@include('includes.errors')

<form method="post" action="{{ $action }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}">

    <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', isset($job->title)?$job->title:'') }}">
    </div>
    <div class="form-group {{ $errors->has('location') ? 'has-error':'' }}">
        <label for="location">Location</label>
        <input type="text" class="form-control" name="location" id="location" value="{{ old('location', isset($job->location)?$job->location:'') }}">
    </div>
    <div class="form-group">
        <label for="password" class="control-label">Type</label>
        <div>
            @foreach($types as $key => $type)
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="type" value="{{ $type }}" {{ ($key==0 || old('type', isset($job->type)?$job->type:'')==$type)?'checked':'' }}> {{ $type }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" class="form-control" name="salary" id="salary" value="{{ old('salary', isset($job->salary)?$job->salary:'') }}">
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error':'' }}">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="10">{{ old('description', isset($job->description)?$job->description:'') }}</textarea>
    </div>

    <div class="form-group text-right">
        <a class="btn btn-default" href="{{ route('company.jobs.list') }}">Cancel</a>
        <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
    </div>
</form>
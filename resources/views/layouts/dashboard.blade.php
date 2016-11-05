@push('styles')
<link href="{{ URL::to('css/dashboard.css') }}" rel="stylesheet">
@endpush

@include('includes.header')

<div class="container" id="main-container">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">My Jobs</a></li>
                <li role="presentation"><a href="#">Profile</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            @include('includes.alert')
            @yield('content')
        </div>
    </div>
</div>

@include('includes.footer')

@push('styles')
<link href="{{ URL::to('css/dashboard.css') }}" rel="stylesheet">
@endpush

@include('includes.header')

<div class="container" id="main-container">
    <div class="row">
        <div class="col-md-2">
            {!! $menu_company_sidebar->render() !!}
        </div>
        <div class="col-md-10">
            @include('includes.alert')
            @yield('content')
        </div>
    </div>
</div>

@include('includes.footer')

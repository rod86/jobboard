@push('styles')
<link href="{{ URL::to('css/frontend.css') }}" rel="stylesheet">
@endpush

@include('includes.header')

<div class="container" id="main-container">
    @yield('content')
</div>

@include('includes.footer')





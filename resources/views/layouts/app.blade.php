<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Tracing | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('frontend/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/jquery/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('frontend/jquery/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js" crossorigin="anonymous"></script>

    {{-- bootstrap --}}
    <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    @yield('custom-style')

</head>

<body>
    <div id="app" style="background: none;">
        @desktop
        @yield('web-content')
        @elsedesktop
        <main class="p-0 m-0">
            @php
                $route = \Route::current()->getName();
            @endphp
            @if ($route == 'home' || $route == 'login' || $route == 'register' || $route == 'password.request' ||
             $route == 'password.confirm' || $route == 'password.reset' || $route == 'verification.notice' || $route == 'dashboard.index'
             || $route == 'dashboard.show')
            @else
                @include('partials.mobile.header.header')
            @endif

            <div id="alert">
                @include('partials.alert.alert')
            </div>
            @yield('mobile-content')
        </main>
        @yield('footer')
        @enddesktop
    </div>

    @yield('script')

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Tracing | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/cce62db690.js" crossorigin="anonymous"></script>

    <script src="{{ asset('frontend/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/jquery/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    @yield('custom-style')
    
</head>
<body>
    <div id="app" style="background: none;">
        @desktop
            @yield('web-content')
        @elsedesktop
        <main class="p-0 m-0"> 
            @yield('header')

            @yield('mobile-content')
        </main>
            @yield('footer')            
        @enddesktop
    </div>
    
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDqlBzMgOyqWDAZUJacsncmGLnxoxED9wk&libraries=places&callback=initialize" type="text/javascript" async defer></script>
    
    @yield('script')
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @auth

        <!-- start header -->
        @include('admin.partials.header')
        <!-- end header -->

        <div class="container-fluid">
            <div class="row">

                <!-- start nav -->
                @include('admin.partials.nav')
                <!-- end nav -->

                <!-- start content main -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
                <!-- end content main -->

            </div>
        </div>

        @else

        @yield('content')

        @endauth

    </div>

    @section('script-footer')
        @show
</body>
</html>

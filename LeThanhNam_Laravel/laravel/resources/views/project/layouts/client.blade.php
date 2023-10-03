<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/main.css') }}">
</head>

<body>

    @include('project.header')
    <div class="container-fluid" style="background-color: grey;z-index: -1">
        <div class="container-fluid m-auto">
            <main class="">
                <aside class="text-center">
                    @section('titleForm')
                    @show
                </aside>
                @yield('content')
            </main>
        </div>
    </div>
    @include('project.footer');


    @yield('js')

    <script src="{{ asset('bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('css')
    {{-- @push()
        <style > </style>
    @endpush --}}
</body>

</html>

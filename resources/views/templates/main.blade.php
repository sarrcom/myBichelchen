<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('MDB/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('MDB/css/mdb.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('MDB/css/addons/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('MDB/css/addons/table-editor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('MDB/css/style.css') }}">
</head>
<body>
        @yield('navbar')
    <main>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
    @include('templates.scripts')
    @yield('extra-scripts')
    {{-- Google Analytics --}}
    @include('templates.google_anal')
</body>
</html>

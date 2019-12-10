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
    <link rel="stylesheet" href="../../MDB/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../../MDB/css/mdb.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../../MDB/css/style.css">
</head>
<body>
    <header>
        @include('templates.navbar')
        @yield('home-header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('templates.footer')
    </footer>
        @include('templates.scripts')
        @yield('extra-scripts')
        {{-- Google Analytics --}}
        @include('templates.google_anal')
</body>
</html>

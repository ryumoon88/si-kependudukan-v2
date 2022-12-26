<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Selecao Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ Vite::image('favicon.png') }}" rel="icon">
    <link href="{{ Vite::image('apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/js/user/main.js'])
    @stack('css')
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center  ">
        {{-- =======
        <header id="header"
            class="fixed-top d-flex align-items-center  header-transparent @if (Route::is('user.login')) header-scrolled @endif">
            >>>>>>> b78a9e3f71da185d2a51eb774f21ca196f2b6943 --}}
        @include('user.layout.header')
    </header><!-- End Header -->

    @if (Route::is('user.index'))
        @include('user.layout.hero')
    @endif

    <main id="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        @include('admin.layout.footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @stack('js')
</body>

</html>

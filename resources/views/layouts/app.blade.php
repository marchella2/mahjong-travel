<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        @stack('prepend-style')
        @include('includes.user.style')
        @stack('addon-style')
    </head>

    <body>
        <!-- Navbar -->
        @include('includes.user.navbar')
        <!-- End Navbar -->

        @yield('content')

        <!-- Footer -->
        @include('includes.user.footer')
        <!-- End Footer-->

        @stack('prepend-script')
        @include('includes.user.script')

        @stack('addon-script')
    </body>
</html>

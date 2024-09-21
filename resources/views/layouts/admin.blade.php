<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('backend/images/logos/favicon.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}" />

    <title>Admin Dashboard</title>

    @yield('css')

    @vite('resources/js/app.js')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('backend/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @include('components.sidebar')
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            @include('components.header')
            <!--  Header End -->

            <div class="body-wrapper">
                <div class="container-fluid mw-100">
                    @yield('content')
                </div>
            </div>

        </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->

    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/js/app.init.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <script src="{{ asset('backend/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/js/theme.js') }}"></script>

    <script src="{{ asset('backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/js/dashboards/dashboard5.js') }}"></script>

    @yield('javascript')

</body>

</html>

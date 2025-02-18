<!doctype html>
<html lang="en">

<head>
        {{-- Meta data --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ env('APP_NAME') }}</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link href="{{ asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome/css/all.css')}}">
        {{-- @vite(['resources/sass/app.scss','resource/css/app.css','resources/js/app.js']) --}}


        {{-- Javascript --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('assets/libs/js/invoice_create.js')}}"></script>
        <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('assets/vendor/dropzone/dropzone.js') }}"></script>
        <!-- slimscroll js -->
        <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- dashboard finance js -->
        <script src="../assets/libs/js/dashboard-finance.js"></script>
        <!-- main js -->
        <script src="../assets/libs/js/main-js.js"></script>
        <!-- daterangepicker js -->
        <script src="../../../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script src="../../../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</head>

<body>
    <!-- main wrapper -->
    <div class="dashboard-main-wrapper">

        <x-header/>

        <!-- left sidebar -->

            <x-side-bar/>

        <!-- end left sidebar -->


        <!-- wrapper  -->
        <div class="dashboard-wrapper">
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                <!-- pageheader  -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2">{{ $head }}</h3>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Finance</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="">{{ $header }}</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end pageheader  -->
                {{-- main content --}}
                {{ $slot }}
                {{-- main content end --}}
                </div>
            </div>
        </div>
        <!-- end wrapper  -->
    </div>
    <!-- end main wrapper  -->
</body>
</html>


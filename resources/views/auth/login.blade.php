<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name','Finance') }}</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link href="{{ asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome/css/all.css')}}">
        {{-- @vite(['resources/sass/app.scss','resource/css/app.css','resources/js/app.js']) --}}

        {{-- Addons Script --}}

        <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>


        <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-color: #faf7f0;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        </style>
</head>

<body>
    <!-- login page  -->
    <div class="main-content1">

        <div class="splash-container1">
            <div class="page-logo"><a href="/"><img class="logo-img" src="../assets/images/FarEastCafe.png" alt="logo"></a></div>
        </div>

        <div class="splash-container2">
            <div class="card1">
            <div class="card-body1">
                <div class="form-group"></div>
                <div><span class="splash-header1">Login</span></div>
                <div><span class="splash-description1">Doesn't have an account? <a href="/signup" class="a-underline">Sign up</a></span></div>
                <form method="POST" action="{{ route('login-session') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input class="form-control form-control-lg @error('email') border-danger @enderror" name="email" id="email" type="text" placeholder="Email" autocomplete="on" value="{{ old('email') }}">
                        <x-error name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control form-control-lg @error('password') border-danger @enderror" name="password" id="password" type="password" placeholder="Password">
                        <x-error name="password"/>
                    </div>
                    <div class="form-group1">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember"><span class="custom-control-label">Remember Me</span>
                        </label>
                        <label class="custom-control">
                            <a href="forgot-password.html" class="a-underline"><span>Forgot Password</span></a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary1 btn-lg btn-block btn-radius">Login</button>
                    <div class="form-group">
                        <x-error name="failed"/>
                    </div>
                </form>
                <div class="form-group2">
                    <div class="splash-description mb text-center">or login with</div>
                </div>
            </div>
        </div>
    </div>

    <!-- end login page  -->
</body>

</html>

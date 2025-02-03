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
    <!-- Sign up page  -->
    <div class="main-content1">

        <div class="splash-container1">
            <div class="page-logo"><a href="/"><img class="logo-img" src="../assets/images/FarEastCafe.png" alt="logo"></a></div>
        </div>

        <div class="splash-container2">
            <div class="card1">
            <div class="card-body1">
                <div class="form-group"></div>
                <div><span class="splash-header1">Create an account</span></div>
                <div><span class="splash-description1">Already have an account? <a href="/login" class="a-underline">Login</a></span></div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control form-control-lg @error('username') border-danger @enderror" name="username" id="username" type="text" placeholder="Username" autocomplete="off" value="{{ old('username') }}">
                        <x-error name="username"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input class="form-control form-control-lg @error('email') border-danger @enderror" name="email" id="email" type="text" placeholder="example123@gmail.com" autocomplete="off" value="{{ old('email') }}">
                        <x-error name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control form-control-lg @error('password') border-danger @enderror" name="password" id="password" type="password" placeholder="Password">
                        <x-error name="password"/>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="form-control form-control-lg @error('password') border-danger @enderror" name="password_confirmation" id="password" type="password" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary1 btn-lg btn-block btn-radius">Sign up</button>
                </form>
                <div class="form-group2">
                    <div class="splash-description mb text-center">or sign up with</div>
                </div>
            </div>
        </div>
    </div>

    <!-- end sign up page  -->
</body>

</html>

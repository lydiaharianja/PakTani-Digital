@extends('Layout.auth')

@section('title')
    Login
@endsection

@section('content')

    <head>
        <title>PAkTANI LOGIN</title>
        <link rel="stylesheet" href="login.css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="container">
            <div class="img">
                <img src="logo-ptd.png">
            </div>
            <div class="login-content">
                <form action="{{ route('login') }}" method="POST">
                    @csrf@extends('layouts.auth')

                @section('title')
                    Login
                @endsection

                @section('content')

                    <head>
                        <title>PAkTANI LOGIN</title>
                        <link rel="stylesheet" href="login.css" />
                        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
                        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                    </head>

                    <body>
                        <div class="container">
                            <div class="img">
                                <img src="logo-ptd.png">
                            </div>
                            <div class="login-content">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <h2 class="title">Login</h2>
                                    <div class="input-div pass">
                                        <div class="i">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="div">
                                            <input type="email" class="input"><i class="icon-envelope"></i></span>
                                            <input class="form-control" type="email" name="email" required=""
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="input-div pass">
                                        <div class="i">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <div class="div">
                                            <input type="password" class="input"><i class="icon-lock"></i></span>
                                            <input class="form-control" type="password" name="password" required=""
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#">Forgot Password?</a>
                                    <input type="submit" class="btn" value="Login">

                                    <span>Don't have an account yet, <a href="{{ route('register') }}">register
                                            here</a>.</span>
                                    <hr />
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    </body>
                @endsection


                <h2 class="title">Login</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <input type="text" class="input"><i class="icon-envelope"></i></span>
                        <input class="form-control" type="Email" required="" name="Email" placeholder="Email">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="text" class="input"><i class="icon-lock"></i></span>
                        <input class="form-control" type="Password" required="" name="Password"
                            placeholder="Password">
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Login">

                <span>Don't have an account yet, <a href="{{ route('register') }}">register here</a>.</span>
                <hr />
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                </form>
        </div>
    </div>
</body>
@endsection

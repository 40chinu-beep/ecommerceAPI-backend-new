<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>

        .login-box
        {
            width: 500px;
            margin: 80px auto;
            padding: 30px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: white;
        }

        .login-box h2
        {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-group
        {
            margin-bottom: 20px;
        }

        label
        {
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="hero_area">

    <!-- Header -->
    @include('home.header')
    <!-- Header End -->

</div>

<div class="container">

    <div class="login-box">

        <h2>Login Here</h2>

        <!-- Session Message -->
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- Email -->
            <div class="form-group">

                <label>Email</label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control"
                       required
                       autofocus>

                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror

            </div>

            <!-- Password -->
            <div class="form-group">

                <label>Password</label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>

                @error('password')
                    <span style="color:red">{{ $message }}</span>
                @enderror

            </div>

            <!-- Remember Me -->
            <div class="form-group">

                <input type="checkbox" name="remember" id="remember_me">

                <label for="remember_me">
                    Remember Me
                </label>

            </div>

            <!-- Forgot Password -->
            <div class="form-group">

                @if (Route::has('password.request'))

                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>

                @endif

            </div>

            <!-- Login Button -->
            <div class="form-group text-center">

                <button type="submit" class="btn btn-primary">
                    Login
                </button>

            </div>

            <!-- Register Link -->
            <div class="text-center">

                <a href="{{ route('register') }}">
                    Create New Account
                </a>

            </div>

        </form>

    </div>

</div>



</body>

</html>

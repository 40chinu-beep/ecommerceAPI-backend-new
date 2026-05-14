<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>

        .register-box
        {
            width: 500px;
            margin: 80px auto;
            padding: 30px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: white;
        }

        .register-box h2
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

    <div class="register-box">

        <h2>Register Here</h2>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <!-- Name -->
            <div class="form-group">
                <label>Name</label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control"
                       required
                       autofocus>

                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control"
                       required>

                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label>Phone</label>

                <input type="text"
                       name="phone"
                       value="{{ old('phone') }}"
                       class="form-control"
                       required>

                @error('phone')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div class="form-group">
                <label>Address</label>

                <input type="text"
                       name="address"
                       value="{{ old('address') }}"
                       class="form-control"
                       required>

                @error('address')
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

            <!-- Confirm Password -->
            <div class="form-group">
                <label>Confirm Password</label>

                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       required>

                @error('password_confirmation')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <!-- Register Button -->
            <div class="form-group text-center">

                <button type="submit" class="btn btn-primary">
                    Register
                </button>

            </div>

            <!-- Login Link -->
            <div class="text-center">

                <a href="{{ route('login') }}">
                    Already Registered? Login Here
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>

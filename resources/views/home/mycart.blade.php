<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        body {
            background: #f5f5f5;
        }

        /* Cart container */
        .cart-container {
            max-width: 1000px;
            margin: 40px auto;
        }

        /* Cart card */
        .cart-box {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        /* Product info */
        .cart-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cart-left img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            background: #f7f7f7;
            border-radius: 8px;
            padding: 5px;
        }

        .cart-details h5 {
            margin: 0;
            font-size: 18px;
        }

        .cart-details p {
            margin: 5px 0;
            color: #777;
        }

        /* Remove button */
        .remove-btn {
            background: red;
            color: #fff;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }

        .remove-btn:hover {
            background: darkred;
        }

        /* Total section */
        .cart-total {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        /* Order form */
        .order-box {
            background: #fff;
            margin-top: 30px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .order-box h4 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .submit-btn {
            background: #007bff;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            border: none;
            width: 100%;
            font-size: 16px;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

    </style>

</head>

<body>

<div class="hero_area">
    @include('home.header')
</div>

@if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif

<div class="cart-container">

    @php $value = 0; @endphp

    @foreach ($cart as $c)

    <div class="cart-box">

        <div class="cart-left">
            <img src="/products/{{ $c->product->image }}" alt="">

            <div class="cart-details">
                <h5>{{ $c->product->title }}</h5>
                <p>Price: ₹{{ $c->product->price }}</p>
            </div>
        </div>

        <a class="remove-btn" href="{{ url('delete_cart',$c->id) }}">
            Remove
        </a>

    </div>

    @php
        $value += $c->product->price;
    @endphp

    @endforeach

    <!-- Total -->
    <div class="cart-total">
        Total Cart Value: ₹{{ $value }}
    </div>

    <!-- Order Form -->
    <div class="order-box">

        <h4>Shipping Details</h4>

        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Receiver Name</label>
                <input class="form-control" type="text" name="name"
                       value="{{ Auth::user()->name }}">
            </div>

            <div class="form-group">
                <label>Receiver Address</label>
                <textarea class="form-control" name="address">
{{ Auth::user()->address }}
                </textarea>
            </div>

            <div class="form-group">
                <label>Receiver Phone</label>
                <input class="form-control" type="text" name="phone"
                       value="{{ Auth::user()->phone }}">
            </div>

            <button class="submit-btn" type="submit">
                Cash On Delivery
            </button>

        </form>

    </div>

</div>

@include('home.footer')

</body>
</html>

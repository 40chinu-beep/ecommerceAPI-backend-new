<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        body {
            background: #f1f3f6;
        }

        .order-container {
            max-width: 1100px;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }

        .order-title {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #2874f0;
            color: #fff;
            padding: 12px;
            font-size: 16px;
            text-align: left;
        }

        td {
            padding: 15px 10px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:hover {
            background: #f9f9f9;
        }

        /* Product section */
        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-info img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            background: #f7f7f7;
            border-radius: 6px;
            padding: 5px;
        }

        .product-name {
            font-weight: 500;
        }

        /* Status badges */
        .status {
            padding: 6px 14px;
            border-radius: 20px;
            color: #fff;
            font-size: 13px;
            display: inline-block;
        }

        .pending {
            background: orange;
        }

        .delivered {
            background: green;
        }

        .cancelled {
            background: red;
        }

        /* Empty message */
        .empty {
            text-align: center;
            padding: 40px;
            font-size: 18px;
            color: #777;
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

<div class="order-container">

    <div class="order-title">My Orders</div>

    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
        </tr>

        @forelse ($order as $ord)

        <tr>

            <!-- Product -->
            <td>
                <div class="product-info">
                    <img src="/products/{{ $ord->product->image }}" alt="">
                    <span class="product-name">
                        {{ $ord->product->title }}
                    </span>
                </div>
            </td>

            <!-- Price -->
            <td>₹{{ $ord->product->price }}</td>

            <!-- Status -->
            <td>
                @if($ord->status == 'pending')
                    <span class="status pending">Pending</span>
                @elseif($ord->status == 'delivered')
                    <span class="status delivered">Delivered</span>
                @else
                    <span class="status cancelled">{{ $ord->status }}</span>
                @endif
            </td>

        </tr>

        @empty

        <tr>
            <td colspan="3">
                <div class="empty">No Orders Found 😔</div>
            </td>
        </tr>

        @endforelse

    </table>

</div>

@include('home.footer')

</body>
</html>

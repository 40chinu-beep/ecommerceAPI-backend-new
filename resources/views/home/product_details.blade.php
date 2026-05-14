<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        /* Main box */
        .product-details-box {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 30px;
        }

        /* Image section */
        .img-box {
            width: 100%;
            height: 350px;
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .img-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; /* image cut nahi hogi */
            transition: 0.4s;
        }

        /* Hover zoom */
        .img-box:hover img {
            transform: scale(1.05);
        }

        /* Details */
        .details-content h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .price {
            color: #e91e63;
            font-size: 26px;
            margin-bottom: 15px;
        }

        .category, .stock {
            margin-bottom: 8px;
            color: #555;
            font-size: 16px;
        }

        .desc {
            margin: 15px 0;
            color: #666;
            line-height: 1.6;
        }

        /* Button */
        .add-cart-btn {
            margin-top: 15px;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="hero_area">
    @include('home.header')
</div>

<!-- Product Details Section -->
<section class="shop_section layout_padding">
    <div class="container">

        <div class="heading_container heading_center">
            <h2>Product Details</h2>
        </div>

        <div class="product-details-box">
            <div class="row">

                <!-- LEFT: IMAGE -->
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="/products/{{ $data->image }}" alt="">
                    </div>
                </div>

                <!-- RIGHT: DETAILS -->
                <div class="col-md-6">
                    <div class="details-content">

                        <h3>{{ $data->title }}</h3>

                        <h4 class="price">₹{{ $data->price }}</h4>

                        <p class="category">
                            Category: <strong>{{ $data->category }}</strong>
                        </p>

                        <p class="stock">
                            Available Quantity:
                            <strong>{{ $data->quantity }}</strong>
                        </p>

                        <p class="desc">
                            {{ $data->description }}
                        </p>

                        <a class="btn btn-primary add-cart-btn"
                           href="{{ url('add_cart',$data->id) }}">
                           Add to Cart
                        </a>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- End Product Details Section -->

@include('home.footer')

</body>
</html>

<!DOCTYPE html>
<html>

<head>

    @include('home.css')
    <style>
/* Grid spacing */
#products .col-sm-6 {
    padding: 15px;
}

/* Product box */
.box {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    transition: 0.3s;
    height: 100%;
    border: 1px solid #eee;
}

/* Hover effect */
.box:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.img-box {
    width: 100%;
    height: 220px;
    background: #f7f7f7; /* empty space clean lage */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.img-box img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;  /* IMPORTANT */
    transition: 0.4s;
}
/* Image hover zoom */
.box:hover .img-box img {
    transform: scale(1.1);
}

/* Detail spacing */
.detail-box {
    padding: 10px;
    text-align: center;
}
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
     @include('home.header')
    <!-- end header section -->

@if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif

    <!-- slider section -->

    @include('home.slider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

    @include('home.product')

  <!-- end shop section -->



  <!-- info section -->

   @include('home.footer')

</body>

</html>

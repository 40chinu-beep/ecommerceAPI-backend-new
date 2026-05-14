<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        h1
        {
            color: white;
        }
        label
        {
            display:inline-block;
            width: 250px;
            font-size: 18px!important;
            color: white!important;
        }
        input[type='text']
        {
            width: 300px;
            height: 50px;
        }
        textarea
        {
            width: 450px;
            height: 80px;
        }
        .input_deg
        {
            padding: 15px;
        }

    </style>
  </head>
  <body>
    <!-- header-->
      @include('admin.header')
    <!-- header end-->

    <!-- Sidebar Navigation -->
      @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>Add Product</h1>

             @if(session()->has('message'))
                <div id="successMsg" style="color: white; background-color: green; padding: 10px; margin: 10px;">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="div_deg">

                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" id="" required></textarea>
                    </div class="input_deg">
                    <div>
                        <label for="">Price</label>
                        <input type="text" name="price" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" id="" required>
                            <option value="">Select a Category</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Add Product">
                    </div>

                </form>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>

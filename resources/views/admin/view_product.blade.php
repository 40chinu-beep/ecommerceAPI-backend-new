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
            margin-top: 60px;
        }

        .table_deg
        {
            border: 2px solid greenyellow;
        }

        th
        {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        th
        {
            border: 1px solid black;
        }

        td
        {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }

        input[type='search']
        {
            width: 500px;
            height: 40px;
            margin-left: 50px;
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

            <form action="{{ url('product_search') }}" method="GET">
                <input type="search" name="search" value="{{ request()->search }}">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($product as $pro)

                    <tr>
                        <td>{{ $pro->title }}</td>
                        <td>{!!Str::limit($pro->description,30)!!}</td>
                        <td>{{ $pro->category }}</td>
                        <td>{{ $pro->price }}</td>
                        <td>{{ $pro->quantity }}</td>
                        <td>
                            <img height="120" width="120" src="products/{{ $pro->image }}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('update_product',$pro->id) }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('delete_product',$pro->id) }}" onclick="return confirm('Are you sure to delete this category?')">Delete</a>
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>

            <div class="div_deg">

                {{ $product->appends(request()->query())->onEachSide(1)->links() }}

            </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style type="text/css">
         input[type='text']
         {
            width: 400px;
            height:40px
         }
         .div_deg
         {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;

         }
         .table_deg
         {
            text-align: center;
            margin: auto;
            border: 2px solid yellowgreen;
            margin-top: 50px;
            width: 600px;
         }
         th
         {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
         }
         td
         {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
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
            <h1 style="color: white">Add Category</h1>

            @if(session()->has('message'))
                <div id="successMsg" style="color: white; background-color: green; padding: 10px; margin: 10px;">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="div_deg">
                <form action="{{ url('add_category') }}" method="POST">
                   @csrf
                    <div>
                        <input type="text" name="category">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>

                </form>
            </div>
            <div>
                <table class="table_deg">
                    <tr>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($data as $row)

                    <tr>
                        <td>{{ $row->category_name }}</td>

                        <td>
                            <a class="btn btn-success" href="{{ url('edit_category',$row->id) }}">Edit</a>
                        </td>

                        <td>
                            <a class="btn btn-danger" href="{{ url('delete_category',$row->id) }}" onclick="return confirm('Are you sure to delete this category?')">Delete</a>
                        </td>
                    </tr>

                    @endforeach


                </table>
            </div>


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>

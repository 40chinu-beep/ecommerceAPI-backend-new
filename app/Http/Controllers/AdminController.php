<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // CATEGORY LIST
    public function view_category()
    {
        return response()->json(Category::all());
    }

    // ADD CATEGORY
    public function add_category(Request $request)
    {
        $category = Category::create([
            'category_name' => $request->category
        ]);

        return response()->json([
            'status' => true,
            'category' => $category
        ]);
    }

    // DELETE CATEGORY
    public function delete_category($id)
    {
        Category::find($id)?->delete();

        return response()->json(['status' => true]);
    }

    // UPDATE CATEGORY
    public function update_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();

        return response()->json(['status' => true]);
    }

    // ADD PRODUCT
    public function upload_product(Request $request)
    {
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->qty;
        $product->category = $request->category;

        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return response()->json([
            'status' => true,
            'product' => $product
        ]);
    }

    // VIEW PRODUCTS
    public function view_product()
    {
        return response()->json(Product::all());
    }

    // DELETE PRODUCT
    public function delete_product($id)
    {
        Product::find($id)?->delete();

        return response()->json(['status' => true]);
    }

    // UPDATE PRODUCT
    public function edit_product(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return response()->json([
            'status' => true,
            'product' => $product
        ]);
    }

    // ALL ORDERS
    public function view_order()
    {
        return response()->json(Order::all());
    }

    // ORDER STATUS
    public function on_the_way($id)
    {
        $order = Order::find($id);
        $order->status = 'On the Way';
        $order->save();

        return response()->json(['status' => true]);
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->save();

        return response()->json(['status' => true]);
    }
}

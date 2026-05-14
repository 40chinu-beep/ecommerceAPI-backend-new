<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // PRODUCTS HOME
    public function home()
    {
        $products = Product::all();

        return response()->json([
            'status' => true,
            'products' => $products
        ]);
    }

    // PRODUCT DETAILS
    public function product_details($id)
    {
        $product = Product::find($id);

        return response()->json([
            'status' => true,
            'product' => $product
        ]);
    }

    // ADD CART
    public function add_cart($id)
    {
        $cart = new Cart;
        $cart->user_id = auth()->id();
        $cart->product_id = $id;
        $cart->save();

        return response()->json([
            'status' => true,
            'message' => 'Added to cart'
        ]);
    }

    // VIEW CART
    public function mycart()
    {
        $cart = Cart::where('user_id', auth()->id())->get();

        return response()->json([
            'status' => true,
            'cart' => $cart
        ]);
    }

    // DELETE CART
    public function delete_cart($id)
    {
        Cart::find($id)?->delete();

        return response()->json([
            'status' => true,
            'message' => 'Item removed'
        ]);
    }

    // PLACE ORDER
    public function confirm_order(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())->get();

        foreach ($cart as $item) {
            Order::create([
                'name' => $request->name,
                'rec_address' => $request->address,
                'phone' => $request->phone,
                'user_id' => auth()->id(),
                'product_id' => $item->product_id,
            ]);
        }

        Cart::where('user_id', auth()->id())->delete();

        return response()->json([
            'status' => true,
            'message' => 'Order placed'
        ]);
    }

    // MY ORDERS
    public function myorders()
    {
        $orders = Order::where('user_id', auth()->id())->get();

        return response()->json([
            'status' => true,
            'orders' => $orders
        ]);
    }
}

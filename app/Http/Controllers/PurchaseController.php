<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    //

    public $purchaseCart;
    public function store(Request $request)
    {
        $userEmail = session('user_email');

        $cartItems = DB::table('cart')->where('user_email', $userEmail)->get();
        $total = 0;




        foreach ($cartItems as $cart) {
            $product_price = $cart->product_price;
            $quantity = $cart->product_quantity;


            $total = $product_price * $quantity;

            $this->purchaseCart = DB::table('purchased_item')->insertOrIgnore([
                'email' => $userEmail,
                'product_id' => $cart->product_id,
                'product_name' => $cart->product_name,
                'product_price' => $cart->product_price,
                'product_quantity' => $cart->product_quantity,
                'total' => $total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
        DB::table('cart')->where('user_email', $userEmail)->delete();

        return $this->purchaseCart ? response()->json(['status' => 'success', 'message' => 'Purchased Successfull']) : response()->json([['status' => 'failed', 'message' => 'No cart items are selected']]);
    }
    public function deleteCartItem($itemId)
    {
        // Use the $itemId parameter to find and delete the cart item
        $cartItem = DB::table('cart')->find($itemId);

        if (!$cartItem) {
            // Handle the case where the cart item is not found (e.g., show an error message)
            return redirect()->back()->with('error', 'Cart item not found.');
        }

        // Delete the cart item
        $cartItem->delete();

        // Redirect back to the cart page or wherever needed
        return redirect()->route('cart.index')->with('success', 'Cart item deleted.');
    }

}
<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

    public function create(Request $request)
    {
        try {
            $insertDataIntoTheCart = DB::table('cart')->insert(
                [
                    'product_id' => $request->product_id,
                    'user_email' => $request->user_email,
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    'product_categories' => $request->product_categories,
                    'product_quantity' => $request->product_quantity,
                    'product_imgs' => $request->product_imgs,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            return $insertDataIntoTheCart ? response()->json(['status' => 'success', 'message' => 'item added successfully']) : response()->json(['status' => 'failed', 'message' => 'Error in inserting item into the cart']);
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => 'error']);
        }
    }

    public function getCartData()
    {
        $cartData = DB::table('cart')->where('user_email', session()->get('user_email'))->get();
        return response()->json(['cart' => $cartData]);
    }

    public function updateQuantity(Request $request)
    {
        $newQuantity = $request->input('quantity');

        $update = DB::table('cart')->where('product_id', $request->id)->update(['product_quantity' => $newQuantity]);

        return $update ? response()->json(['status' => 'success', 'newQuantity' => $newQuantity]) : response()->json(['status' => 'error']);

    }

    public function delete($id)
    {
        $delete = DB::table('cart')->where('id', $id)->delete();
        return $delete ? response()->json(['status' => 'success', 'message' => 'cart item deleted successfully']) : response()->json(['status' => 'failed', 'message' => 'error in deleting cart item']);
    }
}
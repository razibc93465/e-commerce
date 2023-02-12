<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

//use Session;
class CartController extends Controller {

//    public function addToCart(Request $request) {
    public function addToCart($id) {
       //  $productId = $request->id;
        $productById = Product::where('id', $id)->first();
        
      //  $product = Product::find($request->id);
        Cart::add([
          //  'id' => $productById,
            'id' => $id,
            'name' => $productById->productName,
            'price' => $productById->productPrice,
            'qty' => $productById->productQuantity,
        ]);


//        $productId = $request->id;
//        $productById = Product::where('id', $productId)->first();
//        Cart::add([
//            'id' => $productId,
//            'name' => $productById->productName,
//            'price' => $productById->productPrice,
//            'qty' => $request->productQuantity,
//        ]);
        // return $request->all();
        return redirect('/cart/show');
    }

    public function showCart() {
        $cartProducts = Cart::content();
        return view('frontEnd.cart.showCart', ['cartProducts' => $cartProducts]);
    }

    public function deleteCartProduct($id) {
        Cart::remove($id);
        return redirect('/cart/show');
    }

}

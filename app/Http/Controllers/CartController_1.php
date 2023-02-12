<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller {

    public function addToCart(Request $request) {

//        $productId = $request->productId;     
//        $productById = Product::where('id', $productId)->first();
//          $product = Product::find($request->Id);
//        Cart::add([
//            'id'=> $request->id,
//            'name'=>$product->productName,
//            'price'=>$product->productPrice,
//            'qty'=>$request->qty,

       // $productId = $request->productId;
      //  $productById = Product::where('id', $productId)->first();
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->productName,
            'price' => $product->productPrice,
            'qty' => $request->productQuantity,
        ]);


     // return $request->all();


        return redirect('/cart/show');
    }

    public function showCart() {
        return view('frontEnd.cart.showCart');
//        $cartProducts = Cart::content();
//        return view('frontEnd.cart.showCart', ['cartProducts' => $cartProducts]);
        //  Cart::add('192ao12', 'Product 1', 1, 9.99);
        // Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
        //   return view('frontEnd.cart.showCart');
        // $cartProducts = Cart::content();
        // return view('frontEnd.cart.showCart',['cartProducts'=>$cartProducts]);
    }

    public function deleteCartProduct($id) {
        Cart::remove($id);
        return redirect('/cart/show');
    }

}

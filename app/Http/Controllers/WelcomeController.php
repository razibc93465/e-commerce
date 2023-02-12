<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class WelcomeController extends Controller {

//    public function index() {
//        // return "Hello world";
//        //  return view('welcome');
//       // return view('demo');
//        
//    }

    public function index() {
        $publishedProducts = Product::where('publicationStatus', 1)->get();
        return view('frontEnd.home.homeContent', ['publishedProducts' => $publishedProducts]);
        //   return view('frontEnd.home.homeContent');
    }

    public function category($id) {
        $publishedCategoryProducts = Product::where('categoryId', $id)
                ->where('publicationStatus', 1)
                ->get();
        return view('frontEnd.category.categoryContent', ['publishedCategoryProducts' => $publishedCategoryProducts]);
    }

    public function contact() {
        return view('frontEnd.contact.contactContent');
    }

//     public function productDetails() {
//       
//        return view('frontEnd.productDetails.productDetailsContent');
//    }

    public function productDetails($id) {
        $productById = Product::where('id', $id)->first();
        return view('frontEnd.productDetails.productDetailsContent', ['productById' => $productById]);
    }

}

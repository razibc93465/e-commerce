<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function createProduct() {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct', ['categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    public function storeProduct(Request $request) {
        //return $request->all();
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productImage' => 'required',
        ]);

//        $productImage=$request->file('productImage');
//        echo '<pre>';
//        print_r($productImage);

        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        // echo $imageName;
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveProductInfo($request, $imageUrl);
        return redirect('/product/add')->with('message', 'Product info saved successfully');
//        $product = new Product();
//        $product->productName = $request->productName;
//        $product->categoryId = $request->categoryId;
//        $product->manufacturerId = $request->manufacturerId;
//        $product->productPrice = $request->productPrice;
//        $product->productQuantity = $request->productQuantity;
//        $product->productShortDescription = $request->productShortDescription;
//        $product->productLongDescription = $request->productLongDescription;
//        $product->productImage = $imageUrl;
//        $product->publicationStatus = $request->publicationStatus;
    }

    protected function saveProductInfo(Request $request, $imageUrl) {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function manageProduct() {
//      $products=Product::all();
//       echo '<pre>';
//       print_r($products);
//       exit();
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.id', 'products.productName', 'products.productPrice', 'products.productQuantity', 'products.publicationStatus', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->get();
//         echo '<pre>';      
//         print_r($products);
//         exit();
        return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function viewProduct($id) {
        $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();
//         echo '<pre>';      
//         print_r($products);
//         exit();
        return view('admin.product.viewProduct', ['product' => $productById]);
    }

    public function editProduct($id) {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();
        return view('admin.product.editProduct', ['productById' => $productById, 'categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    public function updateProduct(Request $request) {
        $imageUrl = $this->imageExistStatus($request);
//        echo $imageUrl;
//        exit();


        $product= Product::find($request->productId);
        $product->productImage = $imageUrl;
        $product->save();
        return redirect('/product/manage')->with('message', 'Product info updated successfully');
    }

    private function imageExistStatus($request) {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->file('productImage');
//        echo '<pre>';
//        print_r($productImage);
        if ($productImage) {
            // $oldImageUrl = $productById->productImage;
            unlink($productById->productImage);
            //echo 'Hello';
            $imageName = $productImage->getClientOriginalName();
            // echo $imageName;
            $uploadPath = 'public/productImage/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            //echo 'Hi';
            $imageUrl = $productById->productImage;
        }
        return $imageUrl;
    }
    
    
     public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('message', 'Product info deleted successfully');
        
    }
}

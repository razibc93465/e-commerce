<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;  //Elequent ORM
use DB;            //Querry Builder

class CategoryController extends Controller
{
    public function createCategory() {
        return view('admin.category.createCategory');
    }
    
     public function storeCategory(Request $request) {
        // return $request->all();
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ]);

//        $category= new Category();
//        $category->categoryName = $request->categoryName;
//        $category->categoryDescription = $request->categoryDescription;
//        $category->publicationStatus = $request->publicationStatus;
//        $category->save();
//        return 'Category info saved successfully';
//        
//        ELEQUENT ORM
//        Category::create($request->all());
//        return 'Category info saved successfully';
        //QUERRY BUILDER
        DB::table('categories')->insert([
            'categoryName' => $request->categoryName,
            'categoryDescription' => $request->categoryDescription,
            'publicationStatus' => $request->publicationStatus
        ]);
        //return 'Category info saved successfully';
        // return redirect()->back();
        return redirect('/category/add')->with('message', 'Category info saved successfully');
    }

    public function manageCategory() {
        $categories = Category::all();
        return view('admin.category.manageCategory', ['categories' => $categories]);
    }

    public function editCategory($id) {
        // return $id;
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.editCategory', ['categoryById' => $categoryById]);
    }

    public function updateCategory(Request $request) {
        // dd( $request->all() );
        $category = Category::find($request->id);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/category/manage')->with('message', 'Category info updated successfully');
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message', 'Category info deleted successfully');
    }
    
}

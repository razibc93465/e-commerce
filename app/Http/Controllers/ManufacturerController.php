<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Manufacturer;  //Elequent ORM
use DB;            //Querry Builder

class ManufacturerController extends Controller
{
     public function createManufacturer() {
        return view('admin.manufacturer.createManufacturer');
    }

    public function storeManufacturer(Request $request) {
        // return $request->all();
       $this->validate($request, [
           'manufacturerName'=>'required',
           'manufacturerDescription'=>'required',
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
        DB::table('manufacturers')->insert([
            'manufacturerName' =>$request->manufacturerName,
            'manufacturerDescription' =>$request->manufacturerDescription,
            'publicationStatus' =>$request->publicationStatus  
        ]);
        //return 'Category info saved successfully';
       // return redirect()->back();
        return redirect('/manufacturer/add')->with('message','Manufacturer info saved successfully');
        
    }
    
    public function manageManufacturer(){
        $manufacturers= Manufacturer::all();
         return view('admin.manufacturer.manageManufacturer',['manufacturers'=>$manufacturers]);
         
    }
    public function editManufacturer($id){
       // return $id;
        $manufacturerById = Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
    }
    public function updateManufacturer(Request $request){
       // dd( $request->all() );
        $manufacturer = Manufacturer::find($request->id);
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        return redirect('/manufacturer/manage')->with('message','Manufacturer info updated successfully');
        
    }
    public function deleteManufacturer($id){
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manufacturer/manage')->with('message', 'Manufacturer info deleted successfully');
        
    }
}

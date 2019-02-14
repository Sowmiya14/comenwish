<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productpercentage;
use App\vendorproductmaster;
use App\Http\Requests;
use DB;

class ProductpercentageController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

     public function default(){
      $datas = vendorproductmaster::all();
        return view('admin.productpercentage.default', compact('datas'));
    }
     public function update(){
     	$req = request()->all();
     	for($i=1; $i<15; $i++){
       		vendorproductmaster::where('vendorproductcode', 'vendorproduct_'.$i)->update(['productpercentage' => $req['vendorproduct_'.$i]]);
     	}
     	return back()->with('success','Updated Successfully ');
    }

   
}
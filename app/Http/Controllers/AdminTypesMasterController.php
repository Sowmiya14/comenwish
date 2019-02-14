<?php

namespace App\Http\Controllers;

use App\Types;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class AdminTypesMasterController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function show(){
        return view('admin.types.add');
    }

    public function add(Request $request){
        $this->validate(request(),[
            'typeofproducts'=>'required',
            'productname'=>'required',
            ]);
        // dd(request()->all());
        Types::create([
            'typeofproducts' => request('typeofproducts'),
            'productname' => request('productname'),
            'createdby' => 'admin',
            'updatedby' => 'admin',
        ]);
        return back()->with('success','New Types Added Successfully ');
    }

    public function view(){
        $datas = Types::get();
//        dd($datas);
        return view('admin.types.view', compact('datas'));
    }

    public function showEdit($id){
         try {
            $types = Types::findOrfail($id);
            return view('admin.types.edit', compact('types'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function delete($id){
        try {
            $Request = Types::findOrfail($id);
            $Request->delete();
            return back()->with('success','Types Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function update($id){
        $types = Types::findOrfail($id);
        $types->typeofproducts = request('typeofproducts');
        $types->productname = request('productname');
        $types->save();
        return back()->with('success','Types Updated Successfully ');
    }
}

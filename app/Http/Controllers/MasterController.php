<?php
/**
 * Created by PhpStorm.
 * User: greefi
 * Date: 19/5/18
 * Time: 5:49 PM
 */

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Vendortype;
use App\vendorproductmaster;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function vendor(){
        $datas = vendorproductmaster::all();
        return view('admin.master.vendor_master',compact('datas'));
    }

    public function storevendor(){

        $this->validate(request(),[
            'typename'=>'required|min:3|unique:vendortype',
        ]);

        Vendortype::create([
            'vendortypecode'=>Helper::generate_code(Vendortype::latest()->first(),"vendortype"),
            'typename'=>request('typename'),
            'createdby'=>auth()->user()->id,
            'updatedby'=>auth()->user()->id,
            ]
        );
        return back();
    }

   // public function delete($id){
   //      try{
   //          $Request = Vendortype::findOrfail($id);
   //          $Request->delete();
   //          return back();
   //      } catch (Exception $e){
   //          return back();
   //      }
   // }

   public function edit($id){
        try{
            $vendorproductmaster = Vendorproductmaster::findOrfail($id);
            return view('admin.master.edit',compact('vendorproductmaster'));
        } catch (Exception $e){
            return back();
        }
   }

   public  function update($id){
        try{
            $vendorproductmaster = Vendorproductmaster::findOrfail($id);
            $vendorproductmaster->vendorproductname = request('vendorproductname');
            $vendorproductmaster->save();
            return redirect('admin/master/vendor');
        }catch (Exception $e){
            return redirect('admin/master/vendor');

        }

   }
   

}
<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function Vendor(){
        $data['total_vendor'] = Vendor::all()->count();
        $data['unapproved_vendor'] = Vendor::where('verified','>',0)-> get()->count();
         return view('admin.home', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

class AdminProductController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function addProducts(){
        return view('admin.products.add');
    }

    public function viewProducts(){
        return view('admin.products.view');
    }
}

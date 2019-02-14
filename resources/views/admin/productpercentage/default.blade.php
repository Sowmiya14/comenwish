@extends('admin.layout.master')

@section('productpercentage')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Default Product Percentage</h4>
        </div>
    </div>
    @include('admin.layout.errors')
     <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>
    <!-- form -->
    <div class="row">
      <div class="col-md-12 ">
            <form data-toggle="validator" class="padd-20" method="post" action="{{ url('/admin/productpercentage/default') }}" enctype="multipart/form-data">
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Vendor Products</h4>
                        </div>
                     </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">venues</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[0]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[0]->productpercentage }}" required="">
                            </div>
                        </div> 
                
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Caterings</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[1]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[1]->productpercentage }}" required="">
                            </div>
                        </div>      
                         
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Photography</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[2]->vendorproductcode }}"onkeypress="return isNumberKey(event)" value="{{ $datas[2]->productpercentage }}" required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Videography</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[3]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[3]->productpercentage }}"required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Makeup</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[4]->vendorproductcode }}"onkeypress="return isNumberKey(event)" value="{{ $datas[4]->productpercentage }}" required="">
                            </div>
                        </div>      
                      
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Grooming</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[5]->vendorproductcode }}" onkeypress="return isNumberKey(event)"  value="{{ $datas[5]->productpercentage }}"required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Decoration</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[6]->vendorproductcode }}"onkeypress="return isNumberKey(event)" value="{{ $datas[6]->productpercentage }}"  required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">DJ </span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[7]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[7]->productpercentage }}" required="">
                            </div>
                        </div>      
                      
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">SangeethChoreographers</span></label> 
                                <input type="number" min="0" class="form-control" name="{{ $datas[8]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[8]->productpercentage }}"required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Music</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[9]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[9]->productpercentage }}" required="">
                            </div>
                        </div>      
                     
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Cakes</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[10]->vendorproductcode }}"  onkeypress="return isNumberKey(event)" value="{{ $datas[10]->productpercentage }}" required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Transport </span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[11]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[11]->productpercentage }}" required="">
                            </div>
                        </div>      
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Gift Compliments</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[12]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[12]->productpercentage }}" required="">
                            </div>
                        </div>      
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Bridalwear</span></label>
                                <input type="number" min="0" class="form-control" name="{{ $datas[13]->vendorproductcode }}" onkeypress="return isNumberKey(event)" value="{{ $datas[13]->productpercentage }}"required="">
                            </div>
                        </div> 
                         <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Save</button>
                            </div>
                        </div>
                    </div>     
                           
                           </div></div>
                           </form></div></div></div>
                       
@endsection

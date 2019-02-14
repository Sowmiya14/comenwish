@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')

    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Add Products</h4>
        </div>

    </div>
    @include('vendor.layout.errors')
    <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>

    <!-- Title & Breadcrumbs-->
    @include('vendor.layout.products')
 


    {{--Photography--}}
    <div class="row hideall" id="div3">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('vendor.showPhotography')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
     <div class="row mrg-0"> 
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Photography</span></label>
         <select class="form-control" name="typeofphotography" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_3")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Style of Shoot</span></label>
                                <input type="text" class="form-control" name="styleofshoot" id="inputName" data-error="Please Enter Style of Shoot" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Shoot</span></label>
                                <input type="text" class="form-control" name="typeofshoot" id="inputName" data-error="Please Enter Type of Shoot" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Photo Album</span></label>
                                <input type="text" class="form-control" name="photoalbum" id="inputName" data-error="Please Enter Photo Album" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                    <option value="hourly">Hourly</option>
                                    <option value="days">Days</option>
                                    <option value="services">Services</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <!--  <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <input type="text" class="form-control number-only" name="pricing" id="inputName" data-error="Please Enter Pricing" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" name="productimageupload[]" required="" multiple id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Photography</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--Videography--}}
    <div class="row hideall" id="div4">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.showVideoGraphy')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                 <div class="row mrg-0"> 
                    <div class="col-sm-6">
                     <div class="form-group">
                       <label for="inputName" class="control-label"><span class="asterisk">Type of Videography</span></label>
                     <select class="form-control" name="typeofvideography" >
                        @foreach(\App\Helpers\Helper::getTypes() as $types)
                            @if($types->typeofproducts == "vendorproduct_4")
                                <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                            @endif
                        @endforeach
                     </select>
                     <div class="help-block with-errors"></div>
                </div>
            </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Style of Shoot</span></label>
                                <input type="text" class="form-control" name="styleofshoot" id="inputName" data-error="Please Enter Style of Shoot" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Shoot</span></label>
                                <input type="text" class="form-control" name="typeofshoot" id="inputName" data-error="Please Enter Type of Shoot" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')

                     
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                    <option value="hourly">Hourly</option>
                                    <option value="days">Days</option>
                                    <option value="services">Services</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" id="inputName" name="productimageupload[]" required="" multiple aria-describedby="fileHelp">

                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Videography</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{-- Make Up --}}
    <div class="row hideall" id="div5">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.showMakeUp')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Makeupfor</span></label>
                                <input type="text" class="form-control" name="makeupfor" id="inputName" data-error="Please Enter Makeupfor" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pick up and Drop</span></label>
                                <input type="text" class="form-control" name="pickupanddrop" id="inputName" data-error="Please Enter Pickup and Drop" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        @include('vendor.layout.events')


                      
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                    <option value="hourly">Hourly</option>
                                    <option value="days">Days</option>
                                    <option value="services">Services</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add Makeup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

     {{-- Grooming --}}
    <div class="row hideall" id="div6">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('vendor.showGrooming')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Size</span></label>
                                <input type="text" class="form-control number-only" name="size" id="inputName" data-error="Please Enter Size" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Shipping</span></label>
                                <input type="text" class="form-control" name="shipping" id="inputName" data-error="Please Enter Shipping" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Cash On Delivery</span></label>
                                <input type="text" class="form-control" name="cashondelivery" id="inputName" data-error="Please Enter Cash On Delivery" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Live Demo</span></label>
                                <input type="text" class="form-control" name="livedemo" id="inputName" data-error="Please Enter Live Demo" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                    <option value="hourly">Hourly</option>
                                    <option value="days">Days</option>
                                    <option value="services">Services</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Grooming</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--decoration_form--}}
    <div class="row hideall" id="div7">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.showDecoration')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

     <div class="row mrg-0"> 
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Decoration</span></label>
         <select class="form-control" name="typeofdecoration" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_7")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>

  <div class="col-sm-6">
         <div class="form-group">
                <label for="inputName" class="control-label"><span class="asterisk">Serviceable Budget</span></label>
                    <input type="text" class="form-control number-only" name="serviceablebudget" id="inputName" data-error="Please Enter Serviceable Budget" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Serviceable Decoration</span></label>
                                <input type="text" class="form-control" name="serviceabledecoration" id="inputName" data-error="Please Enter Serviceable Decoration" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Budget Limit</span></label>
                                <input type="text" class="form-control number-only" name="budgetlimit" id="inputName" data-error="Please Enter Budget Limit" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')


                       
                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
    
                                    <option value="days">Days</option>
                                    <option value="services">Services</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add Decoration</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- /.col-md-12 -->

    {{--dj_form--}}
    <div class="row hideall" id="div8">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.showDj')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

    <div class="row mrg-0"> 
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of DJ</span></label>
         <select class="form-control" name="typeofdj" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_8")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')

                       <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                <option value="hourly">Hourly</option>
                                <option value="days">Days</option>    
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" class="form-control-file" id="inputName" aria-describedby="fileHelp" multiple>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add DJ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        

    </div>

     {{--Sangeeth ChoreoGraphers--}}
    <div class="row hideall" id="div9">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('vendor.showChoreo')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
    <div class="row mrg-0"> 
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Choreographer</span></label>
         <select class="form-control" name="typeofchoreography" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_9")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Performence</span></label>
                                <input type="text" class="form-control" name="typeofperformence" id="inputName" data-error="Please Enter Type of Performence" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        @include('vendor.layout.events')

                      <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                <option value="hourly">Hourly</option>
                                <option value="services">services</option>    
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" name="productimageupload[]" required="" multiple id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add Choreographers</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--Music--}}
    <div class="row hideall" id="div10">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.showMusic')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
    <div class="row mrg-0"> 
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Music</span></label>
         <select class="form-control" name="typeofmusic" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_10")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <select name="pricing" id="inputName" class="form-control">
                                <option value="hourly">Hourly</option>
                                <option value="days">Days</option>    
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Music</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--cakes_form--}}
    <div class="row hideall" id="div11">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.showCakes')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Serviceable Location</span></label>
                                <input type="text" class="form-control text-only" name="serviceablelocation" id="inputName" data-error="Please Enter Serviceable Location Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Cakes</span></label>
         <select class="form-control" name="typeofcake" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_11")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Flavour</span></label>
                                <input type="text" class="form-control" name="flavour" id="inputName" data-error="Please Enter Flavour Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Cake Delivery</span></label>
                                <input type="text" class="form-control" name="cakedelivery" id="inputName" data-error="Please Enter Cake Delivary Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Cake Size</span></label>
                                <input type="text" class="form-control number-only" name="cakesize" id="inputName" data-error="Please Enter Cake Size Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <input type="text" class="form-control number-only" name="pricing" id="inputName" data-error="Please Enter Pricing Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge Name" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add Cakes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--Transport--}}
    <div class="row hideall" id="div12">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.addtransport')}}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Serviceable Location</span></label>
                                <input type="text" class="form-control text-only" name="serviceablelocation" id="inputName" data-error="Please Enter Serviceable Location" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Transport</span></label>
         <select class="form-control" name="typeoftransport" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_12")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Comfort</span></label>
                                <input type="text" class="form-control" name="typeofcomfort" id="inputName" data-error="Please Enter Type of Comfort" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Vehicle</span></label>
                                <input type="text" class="form-control" name="typeofvehicle" id="inputName" data-error="Please Enter Type of Vehicle" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Subcategory</span></label>
                                <input type="text" class="form-control" name="typeofsubcategory" id="inputName" data-error="Please Enter Type of Subcategory" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Drive</span></label>
                                <input type="text" class="form-control" name="typeofdrive" id="inputName" data-error="Please Enter Type of Drive" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <input type="text" class="form-control number-only" name="pricing" id="inputName" data-error="Please Enter Pricing" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add Transport</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>


      {{--Gift Compliments--}}
    <div class="row hideall" id="div13">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('vendor.showGifts')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
      <div class="row mrg-0"> 
        <div class="col-sm-6">
         <div class="form-group">
           <label for="inputName" class="control-label"><span class="asterisk">Type of Gift Compliments</span></label>
         <select class="form-control" name="typeofgift" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                @if($types->typeofproducts == "vendorproduct_13")
                    <option value="{{ $types->productname }}">{{ $types->productname }}</option>
                @endif
            @endforeach
         </select>
         <div class="help-block with-errors"></div>
    </div>
</div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <input type="text" class="form-control number-only" name="pricing" id="inputName" data-error="Please Enter Pricing" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        @include('vendor.layout.events')


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" required="" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Add Gifts</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

     {{--bridal_wear_form--}}
    <div class="row hideall" id="div14">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.showBridalWear')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control text-only" name="productdescription" id="inputName" data-error="Please Enter Product Description" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Size</span></label>
                                <input type="text" class="form-control number-only" name="size" id="inputName" data-error="Please Enter Size" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Shipping</span></label>
                                <input type="text" class="form-control" name="shipping" id="inputName" data-error="Please Enter Shipping" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Cash On Delivery</span></label>
                                <input type="text" class="form-control" name="cashondelivery" id="inputName" data-error="Please Enter Cash On Delivery" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Live Demo</span></label>
                                <input type="text" class="form-control" name="livedemo" id="inputName" data-error="Please Enter Live Demo" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only" name="servicecharge" id="inputName" data-error="Please Enter Service Charge" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" id="inputName" name="productimageupload[]" required="" aria-describedby="fileHelp" multiple>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Bridalwear</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--caterings_form--}}
    <div class="row hideall" id="div2">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.showCatering')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Dining </span></label>
                                <select name="typeofdining" id="inputName" class="form-control">
                                    <option value="dining">Dining</option>
                                    <option value="buffet">Buffet</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Food</span></label>
                                <select name="typeoffood" id="inputName" class="form-control">
                                    <option value="veg">Veg</option>
                                    <option value="nonveg">Non - Veg</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Meal</span></label>
                                <select name="typeofmeal" id="inputName" class="form-control">
                                    <option value="breakfast">Breakfast</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="dinner">Dinner</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Product Title" required  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Menu</span></label>
                                <textarea name="menu" class="form-control" id="inputName" cols="30" rows="5"></textarea>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Maximum Serving limit</span></label>
                                <input type="text" class="form-control" name="maximumservinglimit" id="inputName" data-error="Please Enter Maximum Serving limit"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.ratevariation')



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" id="inputName" name="productimageupload[]" required="" aria-describedby="fileHelp" multiple>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Catering</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

    {{--venue_form--}}
    <div class="row hideall" id="div1">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.add_venue')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control text-only" name="producttitle" id="inputName" data-error="Please Enter Product Title"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Address</span></label>
                                <textarea name="address" class="form-control" id="inputName" cols="30" rows="5"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <textarea name="productdescription" class="form-control text-only" id="inputName" cols="30" rows="5"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.events')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Availability</span></label>
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="morning" onchange="valueChanged()" >
                                                Morning
                                                <div class="row morning_time">
                                                    <div col-sm-6>
                                                        <input type="time" name="available[morning_time_from]" class="form-control" min="06:00" max="12:00" ><br>
                                                    </div>
                                                    <div col-sm-6>
                                                        <input type="time" name="available[morning_time_to]" class="form-control" min="06:00" max="12:00" >
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" onchange="valueChanged()" id="afternoon">
                                                Afternoon
                                                <div class="row afternoon_time">
                                                    <div col-sm-6>
                                                        <input type="time" name="available[afternoon_time_from]" class="form-control" min="12:00" max="18:00" ><br>
                                                    </div>
                                                    <div col-sm-6>
                                                        <input type="time" name="available[afternoon_time_to]" class="form-control" min="12:00" max="18:00" >
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" onchange="valueChanged()" id="evening">
                                                Evening
                                                <div class="row evening_time">
                                                    <div col-sm-6>
                                                        <input type="time" name="available[evening_time_from]" class="form-control" min="18:00" max="24:00" ><br>
                                                    </div>
                                                    <div col-sm-6>
                                                        <input type="time" name="available[evening_time_to]" class="form-control" min="18:00" max="24:00" >
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Catering</span></label>
                                <select name="catering" id="" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control number-only" name="productprice" id="inputName" data-error="Please Enter Product Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control number-only " name="servicecharge" id="inputName" data-error="Please Enter Service Charge"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" id="inputName" name="productimageupload[]" required="" aria-describedby="fileHelp" multiple>

                            </div>
                        </div>


                    </div>


                    <div class="row mrg-0">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Stage Dimensions</span></label>
                                <input type="text" class="form-control number-only" name="stagedimensions" id="inputName" data-error="Please Enter Stage Diamensions"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Seating Chairs Availability</span></label>
                                <select name="seatingchairsavailability" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Dining Capacity</span></label>
                                <input type="text" class="form-control number-only" name="diningcapacity" id="inputName" data-error="Please Enter Dining capacity"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Dining Equipment</span></label>
                                <select name="diningequipment" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Dining seating availability </span></label>
                                <select name="diningseatingavailability" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Indoor or outdoor</span></label>
                                <select name="indooroutdoor" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">AC</span></label>
                                <select name="acnonac" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Seating Capacity</span></label>
                                <input type="text" class="form-control" name="seatingcapacity" id="inputName" data-error="Please Enter Service Charge"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Parking Space Availability</span></label>
                                <select name="parkingspaceavailability" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Room Availability</span></label>
                                <select name="roomavailability" id="roomavailability" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                    
                                </select><br />
                                <label for="inputName" class="control-label noofrooms"><span class="asterisk">No of Rooms</span></label>
                                
                                <input type="text" class="form-control noofrooms" name="noofrooms" id="#" data-error="Please Enter Service Charge"  >
                                
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Buffet Space</span></label>
                                <select name="buffetspace" id="inputName" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Dining Type</span></label>
                                <select name="diningtype" id="inputName" class="form-control">
                                    <option value="dining">Dining</option>
                                    <option value="buffet">buffet</option>
                                    <option value="both">both</option>
                                    
                                </select>
                                
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Venue</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                    <?php $vendorType= unserialize(auth()->user()->vendortype); 
                    $vendorType = '['.implode(',', $vendorType).']';
                    // print_r($vendorType);
                    ?>
            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection

@section('script')
    <script>
        jQuery(function(){
            jQuery('.hideall').hide();
            temp = 0;
            $("#list_entry").click(function(){
                jQuery('.hideall').hide();
                var radioValue = $("input[name='vendorproductmasters']:checked").val();
                var vendorType = <?php echo $vendorType ?>;
                temp++;
                if(temp == 4){
                    if(jQuery.inArray( parseInt(radioValue), vendorType ) != -1){
                         jQuery('#div'+radioValue).show();
                    }else{
                        if (confirm("Click Here To Add Product And Check Status") == true) {

                            console.log(radioValue);
                                $.ajax({
                                type: "get",
                                url: './updatevendorcategory',
                                data: { catagory_value: radioValue} ,
                                success: function(data) {
                                    if(data == 1){
                                        alert("Your Request Send Successfully");
                                        location.reload();
                                    }else if(data == 2){
                                        alert("Your Request Already Send Please Wait");
                                        location.reload();
                                    }
                                }
                                }) 
                          }
                    }
                    temp = 0;
                }
            });
            $(".noofrooms").hide();
            $(".morning_time").hide();
            $(".afternoon_time").hide();
            $(".evening_time").hide();
           $("#roomavailability").change(function(){
               if($("#roomavailability").val()=="yes"){
                $(".noofrooms").show();
               }else{
                $(".noofrooms").hide();
               }
           });

        

        });

    function valueChanged()
    {
        if($('#morning').is(":checked"))   
            $(".morning_time").show();
        else
            $(".morning_time").hide();

        if($('#afternoon').is(":checked"))   
            $(".afternoon_time").show();
        else
            $(".afternoon_time").hide();   
        if($('#evening').is(":checked"))   
            $(".evening_time").show();
        else
            $(".evening_time").hide();     
             
    }


    </script>
@endsection

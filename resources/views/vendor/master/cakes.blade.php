@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Cakes Master</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/vendor/master/viewcakes') }}" ><button type="button" class="btn gredient-btn">View Cakes</button></a>
            </div>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->
@include('vendor.layout.errors')
    <!-- form -->
    <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.showCakes')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                         <div class="col-sm-6">
                         <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Serviceable Location</span></label>
                                <input type="text" class="form-control" name="serviceablelocation" id="inputName" data-error="Please Enter Serviceable Location Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                         <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Cake</span></label>
                                <input type="text" class="form-control" name="typeofcake" id="inputName" data-error="Please Enter Type of Cake Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Flavour</span></label>
                                <input type="text" class="form-control" name="flavour" id="inputName" data-error="Please Enter Flavour Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control" name="producttitle" id="inputName" data-error="Please Enter Product Title Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                                <input type="text" class="form-control" name="productdescription" id="inputName" data-error="Please Enter Product Description Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Cake Delivery</span></label>
                                <input type="text" class="form-control" name="cakedelivery" id="inputName" data-error="Please Enter Serviceable Events Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Cake Size</span></label>
                                <input type="text" class="form-control" name="cakesize" id="inputName" data-error="Please Enter Cake Size Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <input type="text" class="form-control" name="pricing" id="inputName" data-error="Please Enter Pricing Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control" name="productprice" id="inputName" data-error="Please Enter Product Price Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Rate Variation Percentage</span></label>
                                <input type="text" class="form-control" name="ratevariationpercentage" id="inputName" data-error="Please Enter Rate Variation Percentage Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control" name="servicecharge" id="inputName" data-error="Please Enter Service Charge Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Add Cakes</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection

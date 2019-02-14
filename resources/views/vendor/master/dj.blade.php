@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">DJ Master</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/vendor/master/viewdj') }}" ><button type="button" class="btn gredient-btn">View DJ</button></a>
            </div>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->

    @include('vendor.layout.errors')
    <style>                    
    .asterisk:after{
        content:"*" ;
        color:red ;
        </style>

    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.showDj')}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of DJ</span></label>
                                <input type="text" class="form-control" name="typeofdj" id="inputName" data-error="Please Enter Type of DJ"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control" name="producttitle" id="inputName" data-error="Please Enter Product Title"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <!--  <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Budget Limit</label>
                                <input type="text" class="form-control" name="budgetlimit" id="inputName" data-error="Please Enter Budget Limit"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Serviceable Events</span></label>
                                <input type="text" class="form-control" name="serviceableevents" id="inputName" data-error="Please Enter Serviceable Events"   >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Pricing</span></label>
                                <input type="text" class="form-control" name="pricing" id="inputName" data-error="Please Enter Pricing"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control" name="productprice" id="inputName" data-error="Please Enter Product Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Rate Variation Percentage</span></label>
                                <input type="text" class="form-control" name="ratevariationpercentage" id="inputName" data-error="Please Enter Rate Variation Percentage"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                                <input type="text" class="form-control" name="servicecharge" id="inputName" data-error="Please Enter Service Charge"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" name="productimageupload[]" class="form-control-file" id="inputName" aria-describedby="fileHelp" multiple>
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
        <!-- /.col-md-12 -->

    </div>

@endsection
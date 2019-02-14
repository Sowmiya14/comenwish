@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Make Up Master</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/vendor/master/viewmakeup') }}" ><button type="button" class="btn gredient-btn">View Make Up</button></a>
            </div>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->
    @include('vendor.layout.errors')
  <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.showMakeUp')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Title</label>
                                <input type="text" class="form-control" name="producttitle" id="inputName" data-error="Please Enter Product Title"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Description</label>
                                <input type="text" class="form-control" name="productdescription" id="inputName" data-error="Please Enter Product Description"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Makeupfor</label>
                                <input type="text" class="form-control" name="makeupfor" id="inputName" data-error="Please Enter Makeupfor"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Pick up and Drop</label>
                                <input type="text" class="form-control" name="pickupanddrop" id="inputName" data-error="Please Enter Pickup and Drop"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Serviceable Events</label>
                                <input type="text" class="form-control" name="serviceableevents" id="inputName" data-error="Please Enter Serviceable Events"   >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Pricing</label>
                                <input type="text" class="form-control" name="pricing" id="inputName" data-error="Please Enter Pricing"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Price</label>
                                <input type="text" class="form-control" name="productprice" id="inputName" data-error="Please Enter Product Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Rate Variation Percentage</label>
                                <input type="text" class="form-control" name="ratevariationpercentage" id="inputName" data-error="Please Enter Rate Variation Percentage"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Service Charge</label>
                                <input type="text" class="form-control" name="servicecharge" id="inputName" data-error="Please Enter Service Charge"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Image Upload</label>
                                <input type="file" name="productimageupload[]" multiple class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Add Makeup</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection
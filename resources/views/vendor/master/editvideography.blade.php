@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Videography</h4>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->


    @include('vendor.layout.errors')

    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{ route( 'vendor.update_videography', $data->id ) }}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Type of Videography</label>
                                <input type="text" class="form-control" name="typeofvideography" required="" id="inputName" value="{{ $data->typeofvideography }}" data-error="Please Enter Type of Videography"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Style of Shoot</label>
                                <input type="text" class="form-control" name="styleofshoot" required="" id="inputName" value="{{ $data->styleofshoot }}" data-error="Please Enter Style of Shoot"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Type of Shoot</label>
                                <input type="text" class="form-control" name="typeofshoot" required="" id="inputName" value="{{ $data->typeofshoot }}" data-error="Please Enter Type of Shoot"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Title</label>
                                <input type="text" class="form-control" name="producttitle" required="" id="inputName" value="{{ $data->producttitle }}" data-error="Please Enter Product Title"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Description</label>
                                <input type="text" class="form-control" name="productdescription" required="" id="inputName" value="{{ $data->productdescription }}" data-error="Please Enter Product Description"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.edit_events')


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Pricing</label>
                                <input type="text" class="form-control" name="pricing" required="" id="inputName" value="{{ $data->pricing }}" data-error="Please Enter Pricing"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Price</label>
                                <input type="text" class="form-control" name="productprice" required="" id="inputName" value="{{ $data->productprice }}" data-error="Please Enter Product Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.edit_ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Service Charge</label>
                                <input type="text" class="form-control" name="servicecharge" required="" id="inputName" value="{{ $data->servicecharge }}" data-error="Please Enter Service Charge"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Image Upload</label>
                                <input type="file" class="form-control-file" required="" id="inputName" name="productimageupload[]" multiple aria-describedby="fileHelp">

                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Update Videography</button>
                                </div>
                            </div>
                        </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection
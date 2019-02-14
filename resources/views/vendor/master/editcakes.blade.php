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
    </div>
    <!-- Title & Breadcrumbs-->
    @include('vendor.layout.errors')

    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{ route( 'vendor.update_cakes', $data->id ) }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Serviceable Location</label>
                                <input type="text" class="form-control" value="{{$data->serviceablelocation}}" name="serviceablelocation" required="" id="inputName" data-error="Please Enter Serviceable Location Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Type of Cake</label>
                                <input type="text" class="form-control" value="{{$data->typeofcake}}" name="typeofcake" required="" id="inputName" data-error="Please Enter Type of Cake Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Flavour</label>
                                <input type="text" class="form-control" value="{{$data->flavour}}" name="flavour" required="" id="inputName" data-error="Please Enter Flavour Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Title</label>
                                <input type="text" class="form-control" value="{{$data->producttitle}}" name="producttitle" required="" id="inputName" data-error="Please Enter Product Title Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Description</label>
                                <input type="text" class="form-control" value="{{$data->productdescription}}" name="productdescription" required="" id="inputName" data-error="Please Enter Product Description Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Cake Delivery</label>
                                <input type="text" class="form-control" value="{{$data->cakedelivery}}" name="cakedelivery" required="" id="inputName" data-error="Please Enter Cake Delivary Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Cake Size</label>
                                <input type="text" class="form-control" value="{{$data->cakesize}}" name="cakesize" required="" id="inputName" data-error="Please Enter Cake Size Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Pricing</label>
                                <input type="text" class="form-control" value="{{$data->pricing}}"  name="pricing" required="" id="inputName" data-error="Please Enter Pricing Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Price</label>
                                <input type="text" class="form-control" value="{{$data->productprice}}"  name="productprice" required="" id="inputName" data-error="Please Enter Product Price Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.edit_ratevariation')

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Service Charge</label>
                                <input type="text" class="form-control" value="{{$data->servicecharge}}"  name="servicecharge" required="" id="inputName" data-error="Please Enter Service Charge Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Image Upload</label>
                                <input type="file" name="productimageupload[]" multiple value="{{$data->productimageupload}}"  class="form-control-file" required="" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn">Update Cakes</button>
                                </div>
                            </div>
                        </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection

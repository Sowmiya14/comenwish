@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Venues Master</h4>
        </div>
    </div>
    <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/vendor/master/viewvenues') }}" ><button type="button" class="btn gredient-btn">View Venues</button></a>
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
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.showVenues')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">venuecode</label>
                                <input type="text" class="form-control" name="venuecode" id="inputName" data-error="Please Enter Decoration Code Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                         <div class="form-group">
                                <label for="inputName" class="control-label">Rate Variation Percentage</label>
                                <input type="text" class="form-control" name="ratevariationPercentage" id="inputName" data-error="Please Enter Rate Variation Percentage"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Address</label>
                                <input type="text" class="form-control" name="Address" id="inputName" data-error="Please Enter Address"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Coordinates</label>
                                <input type="text" class="form-control" name="coordinates" id="inputName" data-error="Please Enter Coordinates"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Title</label>
                                <input type="text" class="form-control" name="produttitle" id="inputName" data-error="Please Enter Product Title Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       	<div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Description</label>
                                <input type="text" class="form-control" name="productdescription" id="inputName" data-error="Please Enter Product Description "  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Serviceable Events</label>
                                <input type="text" class="form-control" name="serviceableevents" id="inputName" data-error="Please Enter Serviceable Events"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">acnonac</label>
                                <input type="text" class="form-control" name="acnonac" id="inputName" data-error="Please Enter acnonac"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Indoor outdoor</label>
                                <input type="text" class="form-control" name="indooroutdoor" id="inputName" data-error="Please Enter Indoor outdoor"  >
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
                                <label for="inputName" class="control-label">Seating Capacity</label>
                                <input type="text" class="form-control" name="seatingcapacity" id="inputName" data-error="Please Enter Seating Capacity"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Chairs Availability</label>
                                <input type="text" class="form-control" name="chairsavailability id="inputName" data-error="Please Enter Chairs Availability"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Dining Capacity</label>
                                <input type="text" class="form-control" name="diningcapacity" id="inputName" data-error="Please Enter Dining Capacity"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Dining Seating Availability</label>
                                <input type="text" class="form-control" name="diningseatingavailability" id="inputName" data-error="Please Enter Dining Seating Availability"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Buffet Space</label>
                                <input type="text" class="form-control" name="buffetspace" id="inputName" data-error="Please Enter Buffet Space"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Staged Dimensions</label>
                                <input type="text" class="form-control" name="stagedimensions" id="inputName" data-error="Please Enter Staged Dimensions"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Parking Space Availability</label>
                                <input type="text" class="form-control" name="parkingspaceavailabiliy" id="inputName" data-error="Please Enter Parking Space Availability"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Rooms Availability</label>
                                <input type="text" class="form-control" name="roomsavailability" id="inputName" data-error="Please Enter Rooms Availability"  >
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
                                <label for="inputName" class="control-label">Service Charge</label>
                                <input type="text" class="form-control" name="servicecharge" id="inputName" data-error="Please Enter Service Charge Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Image Upload</label>
                                <input type="file" class="form-control-file" id="inputName" aria-describedby="fileHelp">
                            </div>
                        </div>


                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Add Venues</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>
@endsection
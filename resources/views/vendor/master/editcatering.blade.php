@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Caterings Master</h4>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->
    @include('vendor.layout.errors')

    <!-- form -->
    <div class="row hideall" id="div2">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form class="padd-20" action="{{route('vendor.update_catering',$data->id)}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Dining </span></label>
                                <select name="typeofdining" id="inputName" class="form-control">
                                    <option value="dining" @if($data->typeofdining=='dining') selected @endif >Dining</option>
                                    <option value="buffet" @if($data->typeofdining=='buffet') selected @endif >Buffet</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Food</span></label>
                                <select name="typeoffood" id="inputName" class="form-control">
                                    <option value="veg" @if($data->typeoffood=='veg') selected @endif >Veg</option>
                                    <option value="nonveg" @if($data->typeoffood=='nonveg') selected @endif >Non - Veg</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Meal</span></label>
                                <select name="typeofmeal" id="inputName" class="form-control">
                                    <option value="breakfast" @if($data->typeofmeal=='breakfast') selected @endif >Breakfast</option>
                                    <option value="lunch" @if($data->typeofmeal=='lunch') selected @endif >Lunch</option>
                                    <option value="dinner" @if($data->typeofmeal=='dinner') selected @endif >Dinner</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                                <input type="text" class="form-control" value="{{$data->producttitle}}" name="producttitle" id="inputName" data-error="Please Product Title" required  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.edit_events')


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Menu</span></label>
                                <textarea name="menu" class="form-control" id="inputName" cols="30" rows="5">{{$data->menu}}</textarea>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Maximum Serving limit</span></label>
                                <input type="text" class="form-control" value="{{$data->maximumservinglimit}}" name="maximumservinglimit" id="inputName" data-error="Please Enter Maximum Serving limit"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                                <input type="text" class="form-control" name="productprice" value="{{$data->productprice}}" id="inputName" data-error="Please Enter Product Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @include('vendor.layout.edit_ratevariation')



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                                <input type="file" class="form-control-file" id="inputName" name="productimageupload[]" required="" aria-describedby="fileHelp" multiple>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Update Catering</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>
    <!-- /.col-md-12 -->



@endsection
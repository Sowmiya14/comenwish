@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Caterings Master</h4>
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
                <form data-toggle="validator" class="padd-20" method="post" action="#">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Menu Code</span></label>
                                <input type="text" class="form-control" name="menucode" id="inputName" data-error="Please Enter Menu Code"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                         <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Catering Code</span></label>
                                <input type="text" class="form-control" name="cateringcode" id="inputName" data-error="Please Enter Catering Code"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Menu Name</span></label>
                                <input type="text" class="form-control" name="menuName" id="inputName" data-error="Please Enter Menu Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Detail</span></label>
                                <input type="text" class="form-control" name="detail" id="inputName" data-error="Please Enter Detail"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Menufor</span></label>
                               <select name="catering">
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                </select>
                                <input type="submit" value="Submit">
                            </div>
                          </div>
                        </form>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Price</span></label>
                                <input type="text" class="form-control" name="price" id="inputName" data-error="Please Enter Price"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Add Caterings</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection
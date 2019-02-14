@extends('admin.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Add Types</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/admin/types/view') }}" ><button type="button" class="btn gredient-btn">View Types</button></a>
            </div>
        </div>
    </div>

    @include('admin.layout.errors')

    <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>
    <div class="row" id="div3">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('admin.addTypes')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Products</span></label>

                                <select class="form-control" id = "list_entry" name="typeofproducts">
                                    <option>Select</option>
                                    <option value="vendorproduct_1" disabled> venues</option>
                                    <option value="vendorproduct_2" disabled> Caterings</option>
                                    <option value="vendorproduct_3"> Photography</option>
                                    <option value="vendorproduct_4"> Videography</option>
                                    <option value="vendorproduct_5" disabled> Makeup</option>
                                    <option value="vendorproduct_6" disabled> Grooming</option>
                                    <option value="vendorproduct_7"> Decoration</option>
                                    <option value="vendorproduct_8"> DJ</option>
                                    <option value="vendorproduct_9">SangeethChoreographers</option>
                                    <option value="vendorproduct_10"> Music</option>
                                    <option value="vendorproduct_11"> Cakes </option>
                                    <option value="vendorproduct_12"> Transport </option>
                                    <option value="vendorproduct_13"> Gift Compliments</option>
                                    <option value="vendorproduct_14" disabled> Bridalwear</option>
                                </select>


                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Product Name</span></label>
                                <input type="text" class="form-control" required="" name="productname" id="inputName" data-error="Please Enter Product Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Types</button>
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
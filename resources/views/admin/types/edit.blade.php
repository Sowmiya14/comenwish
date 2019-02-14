@extends('admin.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Types</h4>
        </div>
    </div>

    @include('admin.layout.errors')

    <div class="row" id="div3">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('admin.update_types', $types->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Type of Products</label>

                                <select class="form-control" id = "list_entry" name="typeofproducts">
                                    <option>Select</option>
                                    <option value="Photography" {{ ($types->typeofproducts == "Photography" ? "selected":"") }}>Photography</option>
                                    <option value=" Videography" {{ ($types->typeofproducts == " Videography" ? "selected":"") }}> Videography</option>
                                      <option value="Grooming" {{ ($types->typeofproducts == "Grooming" ? "selected":"") }}>Grooming</option>
                                    <option value="Decoration" {{ ($types->typeofproducts == "Decoration" ? "selected":"") }}>Decoration</option>
                                      <option value="DJ" {{ ($types->typeofproducts == "DJ" ? "selected":"") }}>DJ</option>
                                    <option value="SangeethChoreographers" {{ ($types->eventtype == "SangeethChoreographers" ? "selected":"") }}>SangeethChoreographers</option>
                                      <option value="Music" {{ ($types->typeofproducts == "Music" ? "selected":"") }}>Music</option>
                                    <option value="Cakes" {{ ($types->typeofproducts == "Cakes" ? "selected":"") }}>Cakes</option>
                                      <option value="Transport" {{ ($types->typeofproducts == "Transport" ? "selected":"") }}>Transport</option>
                                    <option value="Gift Compliments " {{ ($types->typeofproducts == "Gift Compliments " ? "selected":"") }}>Gift Compliments </option>
                                      <option value="Bridalwear" {{ ($types->typeofproducts == "Bridalwear" ? "selected":"") }}>Bridalwear</option>
                                </select>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Product Name</label>
                                <input type="text" class="form-control" name="productname" id="inputName" value="{{ $types->productname }}" data-error="Please Enter Product Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Update Types</button>
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
@extends('admin.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Vendor Type</h4>
        </div>
    </div>

    @include('admin.layout.errors')
    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <form data-toggle="validator" class="padd-20" method="POST" action="{{ route('admin.update_vendor_type',$vendorproductmaster->id) }}">
                    {{ csrf_field() }}

                    <div class="row mrg-0">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="vendorproductname" value="{{$vendorproductmaster->vendorproductname}}" id="inputName" placeholder="Vendor Type" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Update Vendor Type</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
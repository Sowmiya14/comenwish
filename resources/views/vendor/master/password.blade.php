@extends('vendor.layout.master')

@section('vendor')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Change Password</h4>
        </div>
    </div>

    @include('vendor.layout.errors')
 <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" method="post" action="{{route('vendor.update_password')}}">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Old Password</label>
                                <input type="password" class="form-control" name="oldpassword" id="inputName" value="" data-error="Please Enter Old Password" required=""  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputEmail" class="control-label">New Password</label>
                                <input type="password" class="form-control" id="inputEmail" name="newpassword" value="" data-error="Please Enter New Password" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                    </div>

                    <div class="row mrg-0">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpassword" value="" id="inputphone" required="" data-error="Please Enter Confirm Password"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Update Vendor</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection

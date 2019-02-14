@extends('admin.layout.master')

@section('dashboard')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    

    @include('admin.layout.errors')

    <!-- form -->
    <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                 <form class="padd-20" action="{{route('admin.updatepassword', $datas->id)}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Old Password</span></label>
                                <input type="password" name="oldpassword" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">New Password</span></label>
                                <input type="password" name="newpassword" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Confirm Password</span></label>
                                <input type="password" name="confirmpassword" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                          <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Update</button>
                            </div>
                        </div>
                    </div>

                        
                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection
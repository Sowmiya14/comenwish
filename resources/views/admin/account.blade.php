
@extends('admin.layout.master')

@section('dashboard')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Account Settings</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
            </div>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->


    @include('admin.layout.errors')

    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                 <form class="padd-20" action="{{route('admin.updateaccount', $datas->id)}}" method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">Name</label>
                                <input type="text" class="form-control text-only" name="name" id="inputName" value="{{$datas->name }}" data-error="Please Enter Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" id="inputName" value="{{$datas->email }}" data-error="Please Enter Email"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Profile Picture</label>
                                <input type="file" name="profilepicture" class="form-control-file" id="inputName" aria-describedby="fileHelp" multiple>
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

            </div></form>
        </div>
        <!-- /.col-md-12 -->

    </div>

@endsection
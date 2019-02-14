@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Location Master</h4>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->

    @include('vendor.layout.errors')

    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('vendor.add_location')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Location Name</label>
                                <input type="text" class="form-control" name="locationname" id="inputName" data-error="Please Enter Location Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn"> Add Location</button>
                            </div>
                        </div>
                    </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>
      <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Location Name</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($datas as $data)
                <tr>
                    <td>{{ $data->locationname  }}</td>
                    <td>
                        <form action="{{ route('vendor.destory_location', $data->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{route('vendor.edit_location',$data->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> </button>
                        </form>


                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
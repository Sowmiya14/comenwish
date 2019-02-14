
@extends('admin.layout.master')

@section('vendor')
    active
@endsection

@section('content')
@include('admin.layout.errors')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Vendors</h4>
        </div>
    </div>


    <!-- Table Card -->

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Vendor Type</th>
                    <th>Business Name</th>
                    <th>GST Number</th>
                    <th>Email</th>
                    <th>Owner Name</th>
                    <th>Mobile Number</th>
                    <th>Business Location</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($datas as $data)
                 <?php 
                    $id = unserialize($data->vendortype);
                  ?>
                <tr>
                    
                    <td>{{ \App\Helpers\Helper::getVendorname($id) }}</td>
                    <td>{{ $data->businessname }}</td>
                    <td>{{ $data->gstnumber }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->ownername }}</td>
                    <td>{{ $data->mobilenumber }}</td>
                    <td>{{ $data->businesslocation }}</td>
                    <td>
                        <form action="{{ route('admin.destory_vendor', $data->id) }}" method="POST">
                           {{ csrf_field() }}
                           <input type="hidden" name="_method" value="DELETE">
                           <a href="{{route('admin.edit_vendor',$data->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                           <a href="{{route('admin.block_vendor',$data->id)}}" class="btn btn-warning"><i class="fa fa-ban"></i></a>
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

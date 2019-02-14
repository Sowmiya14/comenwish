
@extends('vendor.layout.master')

@section('vendor')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Gifts</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/vendor/products/add') }}" ><button type="button" class="btn gredient-btn">Add </button></a>
            </div>
        </div>
    </div>

    @include('vendor.layout.view_products')

    <!-- Table Card -->

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Service Charge</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($datas as $data)
                    <?php $images = unserialize($data->productimageupload) ?>

                    <tr>
                        <td>
                            @foreach($images as $image)
                                <img src="{{ $image }}" alt="" height="50px" width="50px">
                            @endforeach

                        </td>
                        <td>{{ $data->producttitle }}</td>
                        <td>{{ $data->productdescription }}</td>
                        <td>{{ $data->productprice }}</td>
                        <td>{{ $data->servicecharge }}</td>
                        <td>
                            <form action="{{ route('vendor.destory_gift', $data->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('vendor.edit_gift',$data->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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

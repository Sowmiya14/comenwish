@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')

    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">View Products</h4>
        </div>
    </div>

    <div class="form-group">
        <select class="form-control" id = "list_entry">
            <option>Select</option>
            @foreach(\App\Helpers\Helper::viewVendormaster() as $vendorproductmasters )
                <option value="{{ $vendorproductmasters->id }}">{{$vendorproductmasters->vendorproductname }}</option>
            @endforeach
        </select>
    </div>


@endsection

@section('script')
     <script>
         $("#list_entry").change(function () {
            if ($(this).val() == "3") {
                 window.location = "/vendor/master/viewphotography";
             }

            if ($(this).val() == "4") {
                 window.location = "/vendor/master/viewvideography";
             }

            if ($(this).val() == "5") {
                 window.location = "/vendor/master/viewmakeup";
             }

            if ($(this).val() == "6") {
                 window.location = "/vendor/master/viewgrooming";
             }

            if ($(this).val() == "7") {
                 window.location = "/vendor/master/viewdecoration";
             }

            if ($(this).val() == "8") {
                 window.location = "/vendor/master/viewdj";
             }

            if ($(this).val() == "9") {
                window.location = "/vendor/master/viewchoreo";
             }

             if ($(this).val() == "1") {
                window.location = "/vendor/master/viewvenues";
             }

             if ($(this).val() == "2") {
                 window.location = "/vendor/master/viewcaterings";
             }

              if ($(this).val() == "10") {
                 window.location = "/vendor/master/viewmusic";
             }

             if ($(this).val() == "11") {
                 window.location = "/vendor/master/viewcakes";
             }
             if ($(this).val() == "12") {
                 window.location = "/vendor/master/viewtransport";
             }
             if ($(this).val() == "13") {
                 window.location = "/vendor/master/viewgift";
             }

             if ($(this).val() == "14") {
                 window.location = "/vendor/master/viewbridalwear";
             }

         });
     </script>
@endsection

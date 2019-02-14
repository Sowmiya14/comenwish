@extends('admin.layout.master')

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

    @include('admin.layout.products')

@endsection

@section('script')
     <script>
         $("#list_entry").change(function () {
             if ($(this).val() == "12") {
                 window.location = "/vendor/master/viewcakes";
             }
             if ($(this).val() == "8") {
                 window.location = "/vendor/master/viewdecoration";
             }
             if ($(this).val() == "9") {
                 window.location = "/vendor/master/viewdj";
             }
             if ($(this).val() == "14") {
                 window.location = "/vendor/master/viewbridalwear";
             }

         });
     </script>
@endsection

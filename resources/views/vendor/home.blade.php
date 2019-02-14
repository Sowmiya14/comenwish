@extends('vendor.layout.master')

@section('dashboard')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Dashboard</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <i class="icon ti-shopping-cart-full gredient-cl font-30"></i>
                    </div>
                    <div class="widget-detail">
                        <h4 class="mb-1"></h4>
                        <span>Total Orders</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <i class="icon ti-medall gredient-cl font-30"></i>
                    </div>
                    <div class="widget-detail">
                        <h4 class="mb-1"></h4>
                        <span>Total Earnings</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <i class="icon ti-layout-grid2 gredient-cl font-30"></i>
                    </div>
                    <div class="widget-detail">
                        <h4 class="mb-1">{{$count}}</h4>
                        <span>Total Products</span>
                    </div>
                </div>
            </div>
        </div>
    <!-- Title & Breadcrumbs-->
@endsection
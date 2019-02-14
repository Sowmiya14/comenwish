@extends('admin.layout.master')

@section('sitesetting')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Site Settings</h4>
        </div>
    </div>
    @include('admin.layout.errors')
     <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>
     <!-- form -->
    <div class="row">
      <div class="col-md-12 ">
            <form data-toggle="validator" class="padd-20" method="POST" action="{{ url('/admin/sitesetting/sitesetting',$datas[0]->id) }}" enctype="multipart/form-data">
                <div class="card">
                    {{ csrf_field() }}
                     <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Settings</h4>
                        </div>
                     </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Brand Name</span></label>
                                <input type="text" class="form-control" name="brandname"onKeyPress="return ValidateAlpha(event);" value="{{$datas[0]->brandname}}"required="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Brand Icon </span></label>
                                <input type="file" name="brandicon" class="form-control-file" id="inputName" aria-describedby="fileHelp"  value="{{$datas[0]->brandicon}}" multiple>
                            </div>
                        </div></div>
                        <div class="row mrg-0">
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Support Contact Number</label>
                                <input type="tel"  name="supportcontactnumber" class="form-control phone" onkeypress="return isNumberKey(event)"  maxlength="15" value="{{$datas[0]->supportcontactnumber}}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Support Mail</span></label>
                                <input type="email" class="form-control" name="supportmail" id="inputphone" value="{{ $datas[0]->supportmail }}" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div></div>
                        <div class="row mrg-0">
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Booking ID prefix</span></label>
                                <input type="text" class="form-control" name="bookingidprefix"    onKeyPress="return ValidateAlpha(event);" value="{{$datas[0]->bookingidprefix}}" required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Copyright year</label>
                                <input id="month" type="year" class="form-control" name="copyrightyear"  value="{{$datas[0]->copyrightyear}}"required="">
                            </div>
                        </div></div>
                        </div>
                         <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Save</button>
                            </div>
                        </div>
                    </div>     
                           
                           </div></div></form></div></div>
                           </form></div></div></div>
                       
@endsection

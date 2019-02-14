@extends('admin.layout.master')

@section('events')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="theme-cl">Add Events</h4>
        </div>
        <div class="col-md-6 align-self-center">
            <div class="text-center pull-right">
                <a href="{{ url('/admin/event/view') }}" ><button type="button" class="btn gredient-btn">View Events</button></a>
            </div>
        </div>
    </div>

    @include('admin.layout.errors')

    <style>                    
    .asterisk:after{

        content:"*" ;

        color:red ;
        </style>
    <div class="row" id="div3">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('admin.addEvent')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Type of Event</span></label>

                                <select class="form-control" id = "list_entry" name="eventtype">
                                    <option>Select</option>
                                    <option value="business_event">Business Event</option>
                                    <option value="corporate_event">Corporate Event</option>
                                </select>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Event Name</span></label>
                                <input type="text" class="form-control" required="" name="eventname" id="inputName" data-error="Please Enter Event Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Add Event</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.col-md-12 -->

    </div>



@endsection
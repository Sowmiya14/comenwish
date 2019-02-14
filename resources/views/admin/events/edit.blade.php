@extends('admin.layout.master')

@section('events')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Event</h4>
        </div>
    </div>

    @include('admin.layout.errors')

    <div class="row" id="div3">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <!-- form start -->
                <form data-toggle="validator" class="padd-20" action="{{route('admin.update_event', $data->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Type of Event</label>

                                <select class="form-control" id = "list_entry" name="eventtype">
                                    <option>Select</option>
                                    <option value="business_event" {{ ($data->eventtype == "business_event" ? "selected":"") }}>Business Event</option>
                                    <option value="corporate_event" {{ ($data->eventtype == "corporate_event" ? "selected":"") }}>Corporate Event</option>
                                </select>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Event Name</label>
                                <input type="text" class="form-control" name="eventname" id="inputName" value="{{ $data->eventname }}" data-error="Please Enter Event Name"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn gredient-btn"> Update Event</button>
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
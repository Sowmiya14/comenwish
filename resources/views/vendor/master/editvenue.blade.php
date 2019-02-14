@extends('vendor.layout.master')

@section('master')
    active
@endsection

@section('content')

 <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Venues</h4>
        </div>
    </div>
    <!-- Title & Breadcrumbs-->


    @include('vendor.layout.errors')

    <!-- form -->
<div class="row" required="" id="div1">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <!-- form start -->
            <form class="padd-20" action="{{route('vendor.update_venues',$data->id)}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}

                <div class="row mrg-0">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Product Title</span></label>
                            <input type="text" class="form-control" value="{{$data->producttitle}}" name="producttitle" required="" id="inputName" data-error="Please Enter Product Title"  >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Address</span></label>
                            <textarea name="address" class="form-control" required="" id="inputName" cols="30" rows="5">{{$data->address}}</textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Product Description</span></label>
                            <textarea name="productdescription"  class="form-control" required="" id="inputName" cols="30" rows="5">{{$data->productdescription}}</textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    @include('vendor.layout.edit_events')

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Availability</span></label>
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php 
                                        $time = unserialize($data->availability);
                                         ?>

                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="morning"  onchange="valueChanged()" @if(empty(!$time['morning_time_from'])) checked @endif >
                                            Morning
                                            <div class="row morning_time">
                                                <div col-sm-6>
                                                    <input type="time" name="available[morning_time_from]" value="{{$time['morning_time_from']}}" class="form-control" id="mrg_input" min="06:00" max="12:00" ><br>
                                                </div>
                                                <div col-sm-6>
                                                    <input type="time" name="available[morning_time_to]" value="{{$time['morning_time_to']}}" class="form-control mrg_input" min="06:00" max="12:00" >
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" onchange="valueChanged()" id="afternoon" @if(empty(!$time['afternoon_time_from'])) checked @endif>
                                            Afternoon
                                            <div class="row afternoon_time">
                                                <div col-sm-6>
                                                    <input type="time" name="available[afternoon_time_from]" value="{{$time['afternoon_time_from']}}" class="form-control aft_input" min="12:00" max="18:00" ><br>
                                                </div>
                                                <div col-sm-6>
                                                    <input type="time" name="available[afternoon_time_to]" value="{{$time['afternoon_time_to']}}" class="form-control aft_input" min="12:00" max="18:00" >
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" onchange="valueChanged()" id="evening" @if(empty(!$time['evening_time_from'])) checked @endif>
                                            Evening
                                            <div class="row evening_time">
                                                <div col-sm-6>
                                                    <input type="time" name="available[evening_time_from]" value="{{$time['evening_time_from']}}"  class="form-control evn_input" min="18:00" max="24:00" ><br>
                                                </div>
                                                <div col-sm-6>
                                                    <input type="time" name="available[evening_time_to]" value="{{$time['evening_time_to']}}" class="form-control evn_input" min="18:00" max="24:00" >
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Catering</span></label>
                            <select name="catering" required="" id="" class="form-control">

                                <option value="yes" @if($data->catering=='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->catering=='no') selected @endif>No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Product Price</span></label>
                            <input type="text" class="form-control" name="productprice" value="{{$data->productprice}}" required="" id="inputName" data-error="Please Enter Product Price"  >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    @include('vendor.layout.edit_ratevariation')

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Service Charge</span></label>
                            <input type="text" class="form-control" value="{{$data->productprice}}" name="servicecharge" required="" id="inputName" data-error="Please Enter Service Charge"  >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Product Image Upload</span></label>
                            <input type="file" class="form-control-file" id="inputName" name="productimageupload[]" aria-describedby="fileHelp" multiple>

                        </div>
                    </div>


                </div>


                <div class="row mrg-0">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Stage Dimensions</span></label>
                            <input type="text" class="form-control" value="{{$data->stagedimensions}}" name="stagedimensions" required="" id="inputName" data-error="Please Enter Stage Diamensions"  >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Seating Chairs Availability</span></label>
                            <select name="seatingchairsavailability" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->seatingchairsavailability =='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->seatingchairsavailability =='no') selected @endif >No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Dining Capacity</span></label>
                            <input type="text" class="form-control" value="{{$data->diningcapacity}}" name="diningcapacity" required="" id="inputName" data-error="Please Enter Dining capacity"  >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Dining Equipment</span></label>
                            <select name="diningequipment" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->diningequipment =='yes') selected @endif >Yes</option>
                                <option value="no"  @if($data->diningequipment =='no') selected @endif>No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Dining seating availability </span></label>
                            <select name="diningseatingavailability" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->diningseatingavailability =='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->diningseatingavailability =='no') selected @endif  >No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Indoor or outdoor</span></label>
                            <select name="indooroutdoor" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->indooroutdoor =='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->indooroutdoor =='no') selected @endif >No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">AC</span></label>
                            <select name="acnonac" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->indooroutdoor =='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->indooroutdoor =='yes') selected @endif >No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Seating Capacity</span></label>
                            <input type="text" class="form-control" value="{{$data->seatingcapacity}}" name="seatingcapacity" required="" id="inputName" data-error="Please Enter Service Charge"  >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Parking Space Availability</span></label>
                            <select name="parkingspaceavailability" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->parkingspaceavailability =='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->parkingspaceavailability =='no') selected @endif >No</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Room Availability</span></label>
                            <select name="roomavailability" required="" id="roomavailability" class="form-control">
                                <option value="no" @if($data->roomavailability =='no') selected @endif >No</option>
                                <option value="yes" @if($data->roomavailability =='yes') selected @endif >Yes</option>

                            </select><br />
                            <label for="inputName" class="control-label noofrooms"><span class="asterisk">No of Rooms</span></label>

                            <input type="text" class="form-control noofrooms" value="{{$data->noofrooms}}" name="noofrooms" required="" id="#" data-error="Please Enter Service Charge"  >

                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Buffet Space</span></label>
                            <select name="buffetspace" required="" id="inputName" class="form-control">
                                <option value="yes" @if($data->buffetspace =='yes') selected @endif >Yes</option>
                                <option value="no" @if($data->buffetspace =='no') selected @endif >No</option>
                            </select>

                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label"><span class="asterisk">Dining Type</span></label>
                            <select name="diningtype" required="" id="inputName" class="form-control">
                                <option value="dining">Dining</option>
                                <option value="buffet">buffet</option>
                                <option value="both">both</option>

                            </select>

                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn"> Update Venue</button>
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

@section('script')
    <script>
        jQuery(function(){
            $(".noofrooms").hide();
            $(".morning_time").hide();
            $(".afternoon_time").hide();
            $(".evening_time").hide();
           $("#roomavailability").change(function(){
               if($("#roomavailability").val()=="yes"){
                $(".noofrooms").show();
                document.getElementsByClassName("noofrooms").required = true;  
               }else{
                $(".noofrooms").hide();
                $('input[name="noofrooms"]').val('');
               }
           });
        $( window).on("load", function() {
            if($('select[name="roomavailability"]').val()=='yes')
                $(".noofrooms").show();
            if($('#morning').is(":checked")) 
                $(".morning_time").show();
            if($('#afternoon').is(":checked"))   
                $(".afternoon_time").show();
            if($('#evening').is(":checked"))   
                $(".evening_time").show();
        });
    });

    function valueChanged()
    {
        if($('#morning').is(":checked")) 
            $(".morning_time").show();
        else
            $(".morning_time").hide();
        if($('#afternoon').is(":checked"))   
            $(".afternoon_time").show();
        else
            $(".afternoon_time").hide(); 
        if($('#evening').is(":checked"))   
            $(".evening_time").show();
        else
            $(".evening_time").hide();
    }



    </script>
@endsection


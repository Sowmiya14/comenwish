@extends('vendor.layout.master')

@section('vendor')
    active
@endsection

@section('content')
    <!-- Title & Breadcrumbs-->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Add Vendor</h4>
        </div>
    </div>
    @include('vendor.layout.errors')
    <!-- form -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form data-toggle="validator" id="add_vendor_form" class="padd-20" method="post"  action="{{ route('vendor.account_update',$editvendor->id) }}" enctype="multipart/form-data">
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Personal Information</h4>
                        </div>
                     </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="ownername" value="{{$editvendor->ownername }}" onkeypress="return onlyAlphabets(event,this)"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Email</label>
                                <input type="email" class="form-control" value="{{$editvendor->email }}"  name="email" id="inputphone" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-0">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Mobile Number</label>
                                <input type="tel" id="mobilenumber" name="mobilenumber" class="form-control phone" onkeypress="return isNumberKey(event)" value="{{$editvendor->mobilenumber }}" maxlength="15"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Profile Picture</label>
                                <input type="file" name="profilepicture" class="form-control-file" id="inputName" aria-describedby="fileHelp" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Contact Person Name 1</label>
                                <input type="text" name="contactpersonname1" class="form-control" onkeypress="return onlyAlphabets(event,this);"  value="{{$editvendor->contactpersonname1 }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Contact Person Mobile Number 1</label>

                                <input type="tel" name="contactpersonmobileno1" id="contactpersonmobileno1" class="form-control phone"  onkeypress="return isNumberKey(event)"  value="{{$editvendor->contactpersonmobileno1 }}" maxlength="15"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-0">
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Contact Person Name 2</label>
                                <input type="text" name="contactpersonname2" class="form-control" onkeypress="return onlyAlphabets(event,this);" value="{{$editvendor->contactpersonname2 }}"  >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Contact Person Mobile Number 2</label>
                                <input type="tel" name="contactpersonmobileno2" id="contactpersonmobileno2" class="form-control phone" onkeypress="return isNumberKey(event)"  value="{{$editvendor->contactpersonmobileno2 }}" maxlength="15" />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

             
                    </div>
                </div>
                <div class="card">
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Business Information</h4>
                        </div>
                     </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Business Name</label>
                                <input type="text" class="form-control" name="businessname" value="{{$editvendor->businessname }}" id="inputName" onKeyPress="return ValidateAlpha(event);" data-error="Please Enter Business Name"  required="" minlength="3" maxlength="15"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Business logo</label>
                                <input type="file" name="businesslogo" class="form-control-file" id="inputName" value="{{$editvendor->businesslogo }}" aria-describedby="fileHelp" multiple>
                            </div>
                        </div>
                   </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Vendor Type</label>--}}
                                {{--<select class="custom-select mb-2 form-control" name="vendortype[]" multiple="">--}}
                                    {{--<option>Choose...</option>--}}
                                    {{--@foreach($datas as $data)--}}
                                        {{--<option value="{{ $data->id }}" {{ (old('vendortype') == $data->id ? "selected":"") }}>{{ $data->vendorproductname}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="selectBox" onclick="showCheckboxes()">
                                    <select class="custom-select mb-2 form-control" >
                                        <option>Select a Vendor Type</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="checkboxes">
                                <?php $vendor_types = unserialize($editvendor->vendortype); ?>
                                            @foreach($datas as $data)
                                            <label for="{{ $data->id }}">
                                                <input type="checkbox" name="vendortype[]" id="{{ $data->id }}" {{ (in_array($data->id, $vendor_types) ? "checked":"") }} value="{{ $data->id }}" /> {{ $data->vendorproductname}}</label>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputEmail" class="control-label" >GST Number</label>
                                <input type="text" class="form-control" id="inputEmail" name="gstnumber" data-error="Please Enter GST Number" required="" value="{{$editvendor->gstnumber }}" maxlength="15"/>
                                   <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Business Location</label>
                               <p><select id="listBox" name="businesslocation" class="custom-select mb-2
                                    form-control selectDistrict" onchange='selct_district(this.value)'></select></p>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Serviceable Area</label>
                               <p><select id='secondlist' class="custom-select mb-2 form-control" name="serviceablearea" ></select></p>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Update Vendor</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var expanded = false;
        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }
    </script>
    <script>

        $('#form-button').click(function () {
            var number = $("#mobilenumber").intlTelInput("getNumber");
            $("#mobilenumber").val(number);
            var number = $("#contactpersonmobileno1").intlTelInput("getNumber");
            $("#contactpersonmobileno1").val(number);
            var number = $("#contactpersonmobileno2").intlTelInput("getNumber");
            $("#contactpersonmobileno2").val(number);
            $('#add_vendor_form').submit();
        });
        $(document).ready(function () {
            setTimeout(function() {
                $('select option[value="<?php echo $editvendor->businesslocation ?>"]').attr("selected",true);
        }, 100);
            selct_district('<?php echo $editvendor->businesslocation ?>');
            $('#secondlist option[value="<?php echo $editvendor->serviceablearea ?>"]').prop('selected', true);
        });
    </script>
    <script type="text/javascript" src="{{ url('js/state.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



@endsection

@section('style')
    <style type="text/css">



        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
            font-weight: bold;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #e9eff4 solid;
        }

        #checkboxes label {
            display: block;
            margin-left: 8px;
            margin-top: 8px;
        }

        #checkboxes label:hover {
            background-color: #de67b4;
        }
    </style>
@endsection

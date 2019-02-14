<div class="form-group">
    <select class="form-control" id = "list_entry" name="vendorcode" required="">
        <option value="">Select</option>
        @foreach(\App\Helpers\Helper::getUsermaster() as $usermasters)
            <option value="{{$usermasters->vendorcode}}">{{$usermasters->vendorcode}}</option>
        @endforeach
    </select>
</div>
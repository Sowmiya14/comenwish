<div class="col-sm-6">
    <div class="form-group">
        <label for="inputName" class="control-label"><span class = "asterisk" >Serviceable Events</span></label>
        <select class="form-control" id = "list_entry" name="serviceableevents[]" required="" multiple>
            @foreach(\App\Helpers\Helper::getEvent() as $events)
                <option value="{{$events->eventcode}}">{{ $events->eventname }}</option>
            @endforeach
        </select>
    </div>
</div>
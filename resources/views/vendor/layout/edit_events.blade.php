<div class="col-sm-6">
    <div class="form-group">
        <label for="inputName" class="control-label">Serviceable Events</label>
        <select class="form-control" id = "list_entry" name="serviceableevents[]" multiple>
            <?php

                $serialized_events = unserialize($data->serviceableevents);
            ?>
            @foreach(\App\Helpers\Helper::getEvent() as $events)
                <option value="{{$events->eventcode}}" {{ (in_array($events->eventcode, $serialized_events) ? "selected":"") }}  >{{ $events->eventname }}</option>
            @endforeach
        </select>
    </div>
</div>
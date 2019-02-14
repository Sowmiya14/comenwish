<div class="col-sm-6">
    <div class="form-group">
        <label for="inputName" class="control-label">Types of Products</label>
        <select class="form-control" id = "list_entry" name="typeofproducts[]" multiple>
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                <option value="{{$types->id}}">{{ $types->typeofproducts }}</option>
            @endforeach
        </select>
    </div>
</div>
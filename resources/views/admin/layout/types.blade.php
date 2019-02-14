<div class="col-sm-6">
    <div class="form-group">
        <label for="inputName" class="control-label">Type of Products</label>
        <select class="form-control" name="productname" >
            @foreach(\App\Helpers\Helper::getTypes() as $types)
                <option value="{{$types->typeofproducts}}">{{ $types->productname}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>
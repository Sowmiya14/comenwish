<div class="col-sm-6">
    <div class="form-group">
        <label for="inputName" class="control-label">Initial Payment Percentage</label>

        <select class="form-control" required="" name="ratevariationpercentage">
            <option>Select</option>
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i*10 }}" {{ ($data->ratevariationpercentage == $i*10 ? "selected":"") }} >{{ $i*10 }}</option>
            @endfor
        </select>

        <div class="help-block with-errors"></div>
    </div>
</div>
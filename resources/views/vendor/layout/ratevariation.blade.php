<div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label"><span class="asterisk">Initial Payment Percentage</span></label>

                                <select class="form-control" name="ratevariationpercentage" required="">
                                    <option>Select</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                       <option value="{{ $i*10 }}">{{ $i*10 }}</option>
                                    @endfor
                                </select>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>                        
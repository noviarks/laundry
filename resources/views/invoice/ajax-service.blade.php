<?php
if(isset($service_detil)){
    foreach($service_detil as $service){
?>
         <div class="col-sm-12" id="form-qty">
            <div class="form-group form-group-default">
                <label>Qty</label>
                <input id="qty" type="number" min="0" name="qty" class="form-control" placeholder="Fill Qty" required>
            </div>
        </div>
        <div class="col-sm-12" id="form-uom">
            <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                <label>UoM</label>
                <select class="form-control" id="uom" name="uom" readonly required>
                    @foreach($data_uom as $uom)
                    <option value="{{ $uom->id }}" <?php if($uom->id == $service->uom_id) echo 'selected'; ?>>{{ $uom->desc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12" id="form-price">
            <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;">
                <label>Price (Rp)</label>
                <input id="price" type="number" min="0"  name="price" class="form-control" value="{{ $service->price }}" readonly required>
            </div>
        </div>
<?php
    }
}
?>
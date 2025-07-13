<div class="row">
<input type="hidden" name="filter" id="filter" value="">
<div class="col-sm-6">
<label>Shipper No:</label>
<input type="text" class="form-control" id="shipperno" name="shipperno" placeholder="Shipper No">
</div>
<div class="col-sm-6">
<label>Type of Cargo:</label>
<select name="type" id="type" class="form-control">
    <option value="FTL">
        FTL
</option>
<option value="LTL">
        LTL
</option>
</select>
</div>
</div>

<script src="../js/Filter.js">
  </script>
  <script>
    $unactiveFields__ShippingNo = ["type"];
    $unactiveFields__Type = ["shipperno"];
    initField__onClickEvent("shipperno",$unactiveFields__ShippingNo);
    initField__onClickEvent("type",$unactiveFields__Type);
    </script>
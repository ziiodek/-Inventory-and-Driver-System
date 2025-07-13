<div class="row">
<input type="hidden" name="filter" id="filter" value="">
    <div class="col-sm-6">
    <label>Shipper No:</label>
    <input type="text" class="form-control" id="shipperno" name="shipperno" placeholder="Shipper No">
</div>
<div class="col-sm-6">
<label>Customer Id:</label>
<input type="number" class="form-control" id="customer" name="customer" placeholder="Customer Id">
</div>
</div>
<br>

<div class="row">
    <div class="col-sm-6">
    <label>Date:</label>
    <input type="date" class="form-control" id="date" name="date" placeholder="Date">
</div>
<div class="col-sm-6">
<label>Status:</label>
<select name="status" id="status" class="form-control" placeholder="Select Status">
<option value="LIVING_BASE">
    LIVING BASE
</option>
<option value="AT_PORT_OF_ENTRY">
    AT PORT OF ENTRY
</option>
<option value="RECEIVING DOCUMENTS">
    RECEIVING DOCUMENTS
</option>
<option value="ARRVING AT DESTINY">
    ARRIVING AT DESTINY
</option>
<option value="RETURNING TO BASE">
    RETURNING TO BASE
</option>
</select>
</div>
</div>
<br>
<div class="row">
    <div class="col-sm-6">
    <label>Deliver Status:</label>
    <select name="delivered" id="delivered" class="form-control">
<option value="1">
    DELIVER
</option>
<option value="0">
    PENDING
</option>
</select>
</div>
<div class="col-sm-6">
<label>Service Type:</label>
<select name="type" id="type" class="form-control" placeholder="Service Type">
<option value="EXPORTATION">
    EXPORTATION
</option>
<option value="IMPORTATION">
    IMPORTATION
</option>
<option value="LOCAL">
   LOCAL
</option>
<option value="VOID">
    VOID
</option>
</select>
</div>
</div>
<script src="../js/Filter.js">
  </script>
  <script>
    $unactiveFields__ShippingNo = ["customer","date","status","delivered","type"];
    $unactiveFields__Date = ["customer","shipperno","status","delivered","type"];
    $unactiveFields__Customer = ["date","status","shipperno","delivered","type"];
    $unactiveFields__Status = ["date","customer","shipperno","delivered","type"];
    $unactiveFields__Deliver = ["date","customer","shipperno","status","type"];
    $unactiveFields__Type = ["date","customer","shipperno","delivered","status"];
    
    initField__onClickEvent("shipperno",$unactiveFields__ShippingNo);
    initField__onClickEvent("customer",$unactiveFields__Customer);
    initField__onClickEvent("date",$unactiveFields__Date);
    initSelect__onChangeEvent("status",$unactiveFields__Status);
    initSelect__onChangeEvent("delivered",$unactiveFields__Deliver);
    initSelect__onChangeEvent("type",$unactiveFields__Type);
    </script>
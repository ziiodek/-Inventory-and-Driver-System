<div class="row">
<input type="hidden" name="filter" id="filter" value="">
    <div class="col-sm-6">
    <label>Shipper No:</label>
    <input type="text" class="form-control" id="shipperno" name="shipperno" placeholder="Shipper No">
</div>
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
    <label>Origin:</label>
    <select name="origin" id="origin" class="form-control">
    <?php
include ('../PHP/PLACE.php');
$place_manager = new Place();
$place_manager->printPlaces();
?>

</select>
</div>
<div class="col-sm-6">
<label>Destiny:</label>
<select name="destiny" id="dentiny" class="form-control">
<?php
$place_manager->printPlaces();
?>
</select>
</div>
</div>
<script src="../js/Filter.js">
  </script>
  <script>
    $unactiveFields__ShippingNo = ["date","status","delivered","destiny","origin"];
    $unactiveFields__Date = ["shipperno","status","delivered","destiny","origin"];
    $unactiveFields__Status = ["date","shipperno","delivered","destiny","origin"];
    $unactiveFields__Deliver = ["date","shipperno","status","destiny","origin"];
    $unactiveFields__Origin = ["date","shipperno","delivered","status","destiny"];
    $unactiveFields__Destiny = ["date","shipperno","delivered","status","origin"];

    initField__onClickEvent("shipperno",$unactiveFields__ShippingNo);
    initField__onClickEvent("date",$unactiveFields__Date);
    initSelect__onChangeEvent("status",$unactiveFields__Status);
    initSelect__onChangeEvent("delivered",$unactiveFields__Deliver);
    initSelect__onChangeEvent("origin",$unactiveFields__Origin);
    initSelect__onChangeEvent("destiny",$unactiveFields__Destiny);
    </script>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class="row">
<input type="hidden" name="filter" id="filter" value="">
<div class="col-sm-6">
    <input type="text" name="truckId" id="truckId" class="form-control" placeholder="Truck ID">
</div>
<div class="col-sm-6">
    <input type="text" name="plateNo" id="plateNo" class="form-control" placeholder="Plate No">
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
    <input type="text" name="vinNo" id="vinNo" class="form-control" placeholder="Vin No">
</div>
<div class="col-sm-6">
    <input type="text" name="model" id="model" class="form-control" placeholder="Model">
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<select name='country' class='form-control' id='country' placeholder="Country">
</select> 
</div>
<div class="col-sm-6">
<select name='state' class='form-control' id='state' placeholder="State">
</select>
</div>
</div>


<script src="../js/Filter.js"></script>
<script src="../../js/GeoName.js"></script>
<script src="../../js/DisplayCountries.js"></script>
<script src="../../js/DisplayStates.js"></script>
<script src="../../js/ClearStates.js"></script>
<script src="../../js/CountriesEvents.js"></script>
  <script>
    $unactiveFields__TruckId = ["vinNo","plateNo","Model","country","state"];
    $unactiveFields__VinNo = ["plateNo","Model","country","state","truckId"];
    $unactiveFields__PlateNo = ["truckId","Model","country","state","vinNo"];
    $unactiveFields__Model = ["truckId","vinNo","PlateNo","country","state"];
    $unactiveFields__Country = ["truckId","vinNo","PlateNo","state","model"];
    $unactiveFields__State = ["truckId","vinNo","PlateNo","country","model"];

    initField__onClickEvent("truckId",$unactiveFields__TruckId);
    initField__onClickEvent("vinNo",$unactiveFields__VinNo);
    initField__onClickEvent("plateNo",$unactiveFields__PlateNo);
    initField__onClickEvent("model",$unactiveFields__Model);
    initSelect__onChangeEvent("country",$unactiveFields__Country);
    initSelect__onChangeEvent("state",$unactiveFields__State);

    let selectField = document.getElementById('state');
	let geoName = new GeoName();
	geoName.getCountries();
	onChangeEvent__handler(geoName);
    </script>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class="row">
<input type="hidden" name="filter" id="filter" value="">
<div class="col-sm-6">
    <input type="number" name="trailerId" id="trailerId" class="form-control" placeholder="Trailer Id">
</div>
<div class="col-sm-6">
<select name="type" id="type" class="form-control">
	  <option value='STRAIGHT TRUCK'>STRAIGHT TRUCK</option>
	   <option value='DRY VAN'>DRY VAN</option>
	    <option value='FLATBED'>FLATBED</option>
		 <option value='STEP DECKS'>STEP DECKS</option>
		  <option value='CANESTOGA'>CANESTOGA</option>
		   <option value='REMOVABLE GOOSENECK'>REMOVABLE GOOSENECK (RGN)</option>
		    <option value='STRETCH RGN'>STRETCH RGN</option>
			<option value='LOWBOY'>LOWBOY</option>
			<option value='REFRIGERATED'>REFRIGERATED'</option>
			<option value='SPECIALIZED'>SPECIALIZED</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
	<input type="text" name="plateNo" id="plateNo" class="form-control" placeholder="Plate No.">
</div>
<div class="col-sm-6">
<select name='country' class='form-control' id='country' placeholder="Country">
</select> 
</div>
</div>
<br>
<div class="row">
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
    $unactiveFields__TrailerId = ["type","plateNo","state","country"];
    $unactiveFields__Type = ["trailerId","plateNo","state","country"];
    $unactiveFields__PlateNo = ["trailerId","type","state","country"];
	$unactiveFields__Country = ["trailerId","plateNo","type","state"];
    $unactiveFields__State = ["trailerId","plateNo","type","country"];


    initField__onClickEvent("trailerId",$unactiveFields__TrailerId);
    initField__onClickEvent("plateNo",$unactiveFields__PlateNo);
    initSelect__onChangeEvent("type",$unactiveFields__Type);
	initSelect__onChangeEvent("country",$unactiveFields__Country);
    initSelect__onChangeEvent("state",$unactiveFields__State);

	let selectField = document.getElementById('state');
	let geoName = new GeoName();
	geoName.getCountries();
	onChangeEvent__handler(geoName);
    </script>

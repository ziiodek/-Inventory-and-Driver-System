<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class='row'>
<input type="hidden" name="filter" id="filter" value="">
<div class="col-sm-6">
<label>Name:</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Name">
</div>
<div class="col-sm-6">
<label>Country:</label>
<select name='country' class='form-control' id='country' placeholder="Country">
</select> 
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<label>State:</label>
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
    $unactiveFields__Name = ["country","state"];
    $unactiveFields__State = ["name","country"];
    $unactiveFields__Country = ["name","state"];
    initField__onClickEvent("name",$unactiveFields__Name);
    initSelect__onChangeEvent("state",$unactiveFields__State);
    initSelect__onChangeEvent("country",$unactiveFields__Country);

    let selectField = document.getElementById('state');
	  let geoName = new GeoName();
	  geoName.getCountries();
	  onChangeEvent__handler(geoName);
    
    </script>





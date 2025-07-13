<center>
<div style="width:85%;">
<div class="black-box">
<form>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class="row">
<div class="col-sm-6">
<div class="form-group row">
    <label for="country" class="col-sm-2 col-form-label">Country</label>
    <div class="col-sm-10">
    <select name='country' class='form-control bg-gray-input' id='country' required>
</select>
     
    </div>
  </div>

  <br>
  <div class="form-group row">
    <label for="state" class="col-sm-2 col-form-label">State</label>
    <div class="col-sm-10">
    <select name='state' class='form-control bg-gray-input' id='state' required>
    </select>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="city" class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control bg-gray-input" id="city" required>
    </div>
  </div>
</div>

<div class="col-sm-6">
<div class="form-group row">
    <label for="street" class="col-sm-2 col-form-label">Street</label>
    <div class="col-sm-10">
      <input type="text" class="form-control bg-gray-input" id="street" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="zip" class="col-sm-2 col-form-label">Zip Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control bg-gray-input" id="zip" required>
    </div>
  </div>
</div>
</div>
<br>
<button type="submit" class="btn purple-button">Next</button>
</form>
</div>
</div>
</center>


<script src="../js/GeoName.js"></script>
<script src="../js/DisplayCountries.js"></script>
<script src="../js/DisplayStates.js"></script>
<script src="../js/ClearStates.js"></script>
<script src="../js/CountriesEvents.js"></script>
<script>
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
</script>
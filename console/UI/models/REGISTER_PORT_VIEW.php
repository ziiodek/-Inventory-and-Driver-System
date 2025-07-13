
<form action='../PHP/add_port.php' method='post'>
<div class='black-box'>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
  <div class="row">
    <div class="col">
    <label>Port of Entry Name:</label>  
    <input type="text" name='name' class="form-control" placeholder="Port of Entry Name" required>
    </div>
    <div class="col">
    <label>Country:</label>
    <select name='country' class='form-control' id='country' required>
</select> 
      
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col">
    <label>State:</label>
    <select name='state' class='form-control' id='state' required>
</select>
    </div>
    <div class="col">
    <label>City:</label>
    <input type="text" name='city' class="form-control" placeholder="City" required>
    </div>
  </div>
  <br>
      <div class="row">
      <div class="col">
      <label>Street Name:</label>
      <input type="text" name='street' class="form-control" placeholder="Street Name" required>
</div>
    <div class="col">
    <label>Zip Code:</label>
      <input type="number" name='zip' class="form-control" placeholder="Zip Code" required>
    </div>

  </div>
  <br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn purple-button">Register</button>
  <button type="button" class="btn purple-button" id="cancelButton">Cancel</button>
  </div>
  </div>
</div>
</form>

<script src="../../js/GeoName.js"></script>
<script src="../../js/DisplayCountries.js"></script>
<script src="../../js/DisplayStates.js"></script>
<script src="../../js/ClearStates.js"></script>
<script src="../../js/CountriesEvents.js"></script>
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
<script>
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
const urlResolver = new UrlResolver();
const portsUrl = urlResolver.generateUrl("grid","ports","records");

const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,portsUrl);

</script>


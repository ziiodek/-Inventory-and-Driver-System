<html>
<header>
</header>
<body>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<select name='country' class='form-control' id='country' required>
</select>

<select name='state' class='form-control' id='state' required>
</select>

<script src="js/GeoName.js"></script>
<script src="js/DisplayCountries.js"></script>
<script src="js/DisplayStates.js"></script>
<script src="js/ClearStates.js"></script>
<script src="js/CountriesEvents.js"></script>
<script>
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
</script>



</body>

</html>
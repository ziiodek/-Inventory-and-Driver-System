<div class="row">
<input type="hidden" name="filter" id="filter" value="">
<div class="col-sm-6">
<label>Driver Id:</label>
    <input type="number" name="driverid" id="driverid" class="form-control" placeholder="Driver Id">
</div>
<div class="col-sm-6">
<label>Driver License:</label>
<input type="text" name="driverlicense" id="driverlicense" class="form-control" placeholder="Driver License">
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<label>Name:</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Name">
</div>
<div class="col-sm-6">
<label>Last name:</label>
<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname">
</div>
</div>
<script src="../js/Filter.js">
  </script>
  <script>
    $unactiveFields__DriverId = ["driverlicense","name","lastname"];
    $unactiveFields__Name = ["driverlicense","driverid","lastname"];
    $unactiveFields__Lastname = ["driverlicense","name","lastname"];
    $unactiveFields__DriverLicense = ["driverid","name","lastname"];
    initField__onClickEvent("driverid",$unactiveFields__DriverId);
    initField__onClickEvent("name",$unactiveFields__Name);
    initField__onClickEvent("lastname",$unactiveFields__Lastname);
    initField__onClickEvent("driverlicense",$unactiveFields__DriverLicense);
    </script>

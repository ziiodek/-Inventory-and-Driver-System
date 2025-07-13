
<form action='../PHP/add_brand.php' method='post'>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-6">
	<label>Brand Name:</label>
      <input type="text" name='name' class="form-control" placeholder="Brand Name" required>
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

<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js">
  </script>
<script>
const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","brands","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
  </script>
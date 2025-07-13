
<form action='../PHP/upload_document.php' method='post'>
  <div class="row">
    <div class="col-sm-4">
	<label>Select File:</label>
    <input type="file" name="file" class="form-control" multiple required>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn btn-primary purple-btn">Upload</button>
  <button type="button" class="btn btn-primary purple-btn" id="cancelButton">Cancel</button>
  </div>
  </div>
</form>

<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js">
  </script>
<script>
const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","shipping","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
  </script>
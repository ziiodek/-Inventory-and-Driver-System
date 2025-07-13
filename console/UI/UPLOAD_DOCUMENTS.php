
<div class="black-box">
<h5>
Upload Documents
</h5>   
<br>
<form action='../PHP/upload_file.php' method='post' enctype="multipart/form-data">
    <input type="hidden" name="shipperNo_files" value="">
    <input type="hidden" name="action" value="">
   <input type="file" name="file[]" class="form-control" multiple disabled>
   <br>
<button type="submit" class="btn purple-button">
    Upload
</button>
</form>
</div>
<script>
const action = document.getElementsByName('action')[0];
const queryString_action = window.location.search;
const urlParams_action = new URLSearchParams(queryString_action);
action.value=urlParams_action.get('action');
</script>




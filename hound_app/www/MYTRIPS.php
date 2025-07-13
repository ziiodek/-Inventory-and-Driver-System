<!DOCTYPE html>

<html>
<head>
<title>HOUND PROJECT</title>
<link rel="icon" href="images/favicon.ico">
 <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="HOUND PROJECT/ZIIODEK Interactive Solutions">
 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/custom.css" rel="stylesheet">
  <link href="https://allfont.net/allfont.css?fonts=agency-fb" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css" rel="stylesheet" type="text/css" />
   <link href="fontawesome/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
	

	
	
</head>
<body claSS='bg-black'>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Hound Project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" id='mytripsm'>Assigned Trips</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id='tripsdeliverm'>Trips Delivered</a>
      </li>
     
    
    </ul>
  </div>
</nav>



<div class='container jumbotron bg-black text-light'>
<p>
<div class='row'>
<div class='col' id='driverId'></div> <div class='col text-right' id='driverName'></div>
</div>
</p>
<br>


      <center><h4>My Trips</h4></center>
 

<br>

<center>
<div id='tripList'>

  
 </div>
</center>

</div>




<script src="cordova.js"></script>
		
        <script src="js/mytrips.js"></script>

<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>

</body>
</html>

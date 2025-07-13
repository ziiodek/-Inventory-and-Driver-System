<br>
<br>
<div class='container jumbotron bg-black'>
<form method='post' action='php/register.php'>
  <div class="row">
    <div class="col-sm-6 text-light">
      <h4>Register</h4>
    </div>
  </div>
<br>
 <br>
  <div class="row">
    <div class="col">
      <input type="text" name='name' class="form-control" placeholder="First name" required>
    </div>
    <div class="col">
      <input type="text" name='lastname' class="form-control" placeholder="Last name" required>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col">
      <input type="email" name='email' class="form-control" placeholder="Email Address" required>
    </div>
    <div class="col">
      <input type="text" name='company' class="form-control" placeholder="Company Name" required>
    </div>
  </div>
  <br>
      <div class="row">
      <div class="col">
      <input type="tel" name='phone' class="form-control" placeholder="Phone Number" required>
    </div>
	<div class="col">
      <input type="text" name='dot' class="form-control" placeholder="US-DOT" required>
    </div>

  </div>
  <br>
      <div class="row">
    <div class="col-sm-6">
      <input type="password" name='password' class="form-control" placeholder="Password" required>
    </div>
  </div>
  
  <br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn btn-primary purple-btn">Register</button>
  <br>
  <br>
  <a class='text-primary' href='LOGIN.php'>Login</a>
  </div>
  </div>
</form>
</div>
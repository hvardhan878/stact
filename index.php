<html>
<head>
<?php include("createdatabase.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>
<nav class="navbar navbar-expand-md">
  <a class="navbar-brand" href="#"><img src="assets/images/stactlogo.png" title="" style="height: 4rem;"></a>
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main-navigation">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<header class="page-header header container-fluid">
  <div class="overlay">
  </div>
  <div class="description">
    <h1>Welcome to Stact!</h1>
    <p>Your Employees are an asset and we at Stact provide an exciting ecosystem for you to utilize them to the fullest. Stact provides you a platform to make money out of your idle staff. Sign up now to maximum your profits!</p>
    <button class="btn btn-outline-secondary btn-lg" style = "width:50%; margin:8px;" onclick="signup()">Sign Up!</button>
    <button class="btn btn-outline-secondary btn-lg" style = "width:50%; margin:8px;" onclick="login()">Login</button>
  </div>
</header>


<div class="container features">
  <h3 class="feature-title text-center">Get in Touch!</h3>
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Name" name="">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" placeholder="Email Address" name="email">
  </div>
  <div class="form-group">
    <textarea class="form-control" rows="4"></textarea>
  </div>
  <input type="submit" class="btn btn-secondary btn-block" value="Send" name="">
</div>

<footer class="page-footer" style = "background-color: #222;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">
      <h6 class="text-uppercase font-weight-bold">Additional Information</h6>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <h6 class="text-uppercase font-weight-bold">Contact</h6>
      <p> Sha Tin, Hong Kong
      <br/>info@stact.com
      <br/>+ 852 551 555 27
      </p>
    </div>
  </div>
  <div class="footer-copyright text-center">© 2019 Copyright Stact - All Rights Reserved</div>
</footer>
<script>
function signup(){

    window.location.href="signup.php";
}
function login(){

    window.location.href="login.php";
}
</script>

</body>

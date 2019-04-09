<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="World's first B2B Skills Marketplace">
<title>World's first B2B Skills Marketplace-Stact</title>
<link rel="icon" sizes="114x114" href="assets/images/favicon.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

@media (max-width: 575.98px) {
  .fa {
    padding: 10px;
    font-size: 15px;
    width: 35px;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
    border-radius: 50%;
  }

}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}



</style>
<link rel="stylesheet" type="text/css" href="css/loader.css">
</head>
<body>
  <div id="loader-wrapper">
      <div id="loader"></div>

      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>

  </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src = "loader.js"></script>
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
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
  </div>
</nav>


<header class="page-header header container-fluid">
  <div class="overlay">
  </div>
  <div class="description">
    <h1>Welcome to Stact!</h1>
    <p style>Employees are an asset and we at Stact provide an exciting ecosystem for you to utilize them to the fullest. Stact provides you an AI powered platform to make money out of your idle staff by lending them to businesses in need. Sign up now to maximize your profits!</p>
    <button class="btn btn-outline-secondary btn-lg" style = "width:50%; margin:8px;" onclick="signup()">Sign Up!</button>
    <button class="btn btn-outline-secondary btn-lg" style = "width:50%; margin:8px;" onclick="login()">Login</button>
  </div>
</header>


<div class="container features" id = "contact">
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
      <h6 class="text-uppercase font-weight-bold">Follow Us</h6>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-linkedin"></a>
      <a href="#" class="fa fa-youtube"></a>
      <a href="#" class="fa fa-instagram"></a>
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

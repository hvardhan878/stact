<html>
<?php

include("sqlconnect.php");

$sql ="CREATE TABLE password_reset_temp (
            `email` varchar(250) NOT NULL,
            `key` varchar(250) NOT NULL,
            `expDate` datetime NOT NULL)";
$link->query($sql);

//echo $link->error;

 ?>
<head>
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
<a class="navbar-brand" href="index.php"><img src="assets/images/stactlogo.png" title="" style="height: 4rem;"></a>
<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="main-navigation">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="signup.php">Sign Up</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
  </ul>
</div>
</nav>

<header class="page-header header container-fluid" >
  <div class="overlay">
  </div>
  <div class="description" style = "background:#fff;width:100%;height:30%;">

     <h3 style = "margin-top:30px;">Request Password Reset</h3>
     <form action ="actionforgotpassword.php" method = "post">
      <input type="text"  class="form-control" id="email" name = "email" placeholder="Enter Email" required style = "margin:auto;width:30%;margin-top:20px;">
      <button type = "submit" class="btn btn-primary btnaddemp" style = "width:30%; margin:8px;margin-top:20px;">Submit</button>
    </form>


</header>





</body>

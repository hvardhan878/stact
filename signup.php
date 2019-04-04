<html>
<?php

include ("sqlconnect.php");
session_start();
if($_SESSION["emailerr"] != ""){}
else
{$_SESSION["emailerr"] = "";}
if($_SESSION["passerr"] != ""){}
else
{$_SESSION["passerr"] = "";}


$sqltable =  "CREATE TABLE Users (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    companyid INT(10) UNSIGNED,
    CompanyRegister VARCHAR(10) NOT NULL
  )";

  if ($link->query($sqltable) === TRUE) {
      echo "Table Users created successfully";
  } else {
      echo "Error creating table: " . $link->error;
  }

$link->close();

 ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="css/signup.css">

<style>
.error{
  font-size: 14px;
  color: #6ab446;
}

</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>
<div class="split left">
  <div>
    <img src="assets/images/signupbackground.jpg" style = "height:100%">

  </div>
</div>

<div class="split right">
  <div>

  <form class = "centered" action="actionregister.php" method="post">
    <div class="container">
      <img class = "center" src="assets/images/stactlogo.png" title="" style="height: 6rem;">
      <h5 style = "color:#fff">Register a new account!</h5>
      <hr>
      <label for="fname"><b>First Name</b></label>
      <input type="text" name="firstname" required>

      <label for="lname"><b>Last Name</b></label>
      <input type="text"  name="lastname" required>

      <label for="email"><b>Email </b> <b class = "error"><?php  echo $_SESSION["emailerr"];?></b></label>
      <input type="text"  name="email" required>


      <label for="psw"><b>Password</b></label>
      <input type="password"  name="password" required>

      <label for="psw-repeat"><b>Confirm Password </b><b class = "error"><?php  echo $_SESSION["passerr"];?></b></label>
      <input type="password"  name="confirmpassword" required>

      <button type="submit" class="registerbtn">Register</button>
      <div class="signin">
        <p style = "color:#fff; margin-top:12px; font-size:14px">Already have an account? <a href="login.php">Sign in</a></p>
      </div>
    </div>


  </form>
</div>



</body>

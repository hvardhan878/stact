<html>
<?php

include ("sqlconnect.php");
session_start();
if($_SESSION["passerr"] != ""){}
else
{$_SESSION["passerr"] = "";}?>
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
<script src="loader.js"></script>
<script src="main.js"></script>
<div class="split left">
  <div>
    <img src="assets/images/loginbackground.jpg" style = "height:100%">

  </div>
</div>

<div class="split right">
  <div>

  <form class = "centered" action="actionlogin.php" method="post">
    <div class="container">
      <img class = "center" src="assets/images/stactlogo.png" title="" style="height: 6rem;">
      <h5 style = "color:#fff">Login to your account!</h5>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text"  name="email" required>
      <label for="psw"><b>Password</b><b class = "error"></label>
      <input type="password"  name="password" required>
      <label><b class = "error"><?php  echo $_SESSION["passerr"];?></b></label>
      <button type="submit" class="registerbtn">Login</button>
      <div class="forgotpassword">
        <p style = "color:#fff; margin-top:12px; font-size:14px"><a href="forgotpassword.php">Forgot your password?</a></p>
        <p style = "color:#fff;text-align:center">OR</p>
      </div>
    </div>
  </form>
  <div class = "container" style="padding:0px; padding-right:16px; padding-left:16px;">
  <button class="registerbtn" onclick ="signup()">Register a new account</button>
  </div>
</div>

<script>
function signup(){

    window.location.href="signup.php";
}
</script>


</body>

<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="css/employeeform.css">
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
<style>

.btnaddemp:hover{
border:1px solid #000;
background:#fff;
color:#000;
}

</style>

</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="bootstrap-multiselect.js"></script>
<?php
session_start();
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION["CompanyRegister"] == "true"){
    header("location: dashboard.php");
    exit;
}

include("sqlconnect.php");


$createcomp =  "CREATE TABLE Companies(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(10) UNSIGNED,
    CompanyName VARCHAR(100) NOT NULL,
    Country VARCHAR(15) NOT NULL,
    Address LONGTEXT NOT NULL,
    MajorCities LONGTEXT,
    Phone VARCHAR(20) NOT NULL,
    RegistrationNumber VARCHAR(80) NOT NULL,
    Industries LONGTEXT NOT NULL,
    NumberEmployees VARCHAR(10) NOT NULL,
    Stars INT UNSIGNED
  )";
$link->query($createcomp);

$link->close();

?>
<nav class="navbar navbar-expand-md">
  <a class="navbar-brand" href="#"><img src="assets/images/stactlogo.png" title="" style="height: 4rem;"></a>
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main-navigation">
    <ul class="navbar-nav">
      <li class="nav-item">
        <div class="dropdown">
          <?php echo '<button class="btn btn-secondary dropdown-toggle" style = "background:#2D143B;margin-right:20px"type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
               echo htmlspecialchars($_SESSION["Email"]);
               echo '</button>';?>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </div>
        </li>
    </ul>
  </div>
</nav>

<script type="text/javascript">
$(document).ready(function() {
      $("#cities").hide();
      $('#example-getting-started').multiselect();
      $('#majorcities').multiselect();
      $("#country").change(function() {

        if($(this).val()=="India")
          $("#cities").show();
        if($(this).val()=="Hong Kong")
          $("#cities").hide();
      });
});

</script>
<div class = "container">
  <div class = "title">
    <p>Create Company Profile</p>
  </div>
  <form method = "post" action ="actioncompany.php" id = "test_form">
    <div class="form-group row">
      <label for="inputcompany3" class="col-sm-2 col-form-label">Company Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputcompany3" name = "company" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputCountry3" class="col-sm-2 col-form-label">Select Country</label>
      <div class="col-sm-10">
        <select name = "country" id ="country" required>
             <option hidden disabled selected value> </option>
             <option value="India" class ="options">India</option>
             <option value="Hong Kong" class ="options">Hong Kong</option>
       </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputaddress3" class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputaddress3" name = "address" required>
      </div>
    </div>

    <div class="form-group row" id ="cities">
      <label for="inputCity3" class="col-sm-2 col-form-label">Major cities you operate in</label>
      <div class="col-sm-10">
        <select class = "multiselect" id ="majorcities" multiple="multiple" name = "majorcities[]">
             <option value="New Delhi" class ="options">New Delhi</option>
             <option value="Mumbai" class ="options">Mumbai</option>
       </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputphone3" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputphone3" name = "phone" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputcompreg3" class="col-sm-2 col-form-label">Company Registration Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputcompreg3" name = "compreg" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputIndustries3" class="col-sm-2 col-form-label">Industries you operate in</label>
      <div class="col-sm-10">
        <select class = "multiselect" id="example-getting-started" name = "industries[]" multiple="multiple" required>
             <option value="Banking" class ="options">Banking</option>
             <option value="Technology" class ="options">Technology</option>
             <option value="Insurance" class ="options">Insurance</option>
       </select>

      </div>
    </div>
    <div class="form-group row">
      <label for="inputemployees3" class="col-sm-2 col-form-label">Number of Employees</label>
      <div class="col-sm-10">
        <select name = "employees" required>
             <option hidden disabled selected value> </option>
             <option value="1-10" class ="options">1-10</option>
             <option value="11-50" class ="options">11-50</option>
             <option value="51-100" class ="options">51-100</option>
             <option value="101-250" class ="options">101-250</option>
             <option value="251-500" class ="options">251-500</option>
             <option value="500+" class ="options">500+</option>
       </select>
      </div>
    </div>

    <div class="form-check" style="margin-bottom:10px;">
         <input class="form-check-input" type="checkbox"  id="defaultCheck1" required>
         <label class="form-check-label" for="defaultCheck1">
           I have read and agree to all the <a href = "#">terms and conditions</a>
         </label>
    </div>


    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" id = "save" class="btn btn-primary btnaddemp">Submit</button>
      </div>
    </div>
  </form>



</div>



</body>

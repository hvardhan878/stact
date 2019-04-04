<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<style>

.download:hover{
  opacity: 0.7;
}


.btnaddemp:hover{
border:1px solid #000;
background:#fff;
color:#000;
}



</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>

<?php
include("dashnavbar.php");
include("sqlconnect.php");


    if(isset($_GET["employeeid"]))
    {
        $employeeid = $_GET["employeeid"];

    }

$sql = mysqli_query($link,"SELECT * FROM Employee where id = '$employeeid'");
$row = mysqli_fetch_array($sql);


?>

<div style = "margin:30px;margin-bottom:40px;">
<div>
<p style = "font-size:25px;margin-bottom:0px;margin-right:20px;float:left">Employee Profile</p>
<button type="button" id = "save" class="btn btn-primary btnaddemp">Send Request for this employee</button>
</div>

<hr>

<form>



<div class="form-group row">
  <label for="staticfirstname" class="col-sm-2 col-form-label">First Name</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="firstname" value="<?php echo $row["FirstName"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label for="staticlastname" class="col-sm-2 col-form-label">Last Name</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="lastname" value="<?php echo $row["LastName"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">LinkedIn</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["LinkedIn"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Job Title</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["JobTitle"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Industries</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["Industries"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Qualifications</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["Qualifications"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Location</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php if($row["Country"]=="India"){echo $row["Cities"];}else {echo $row["Country"]; }?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Skills</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["Skills"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Availability</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["StartDate"]." to ".$row["EndDate"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Hourly Rates*</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $row["MinHr"]." ".$row["Currency"]." to ".$row["MaxHr"]." ".$row["Currency"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Resume</label>
  <div class="col-sm-10">
    <a href="<?php echo $row["ResumePath"];?>" download>
    <img class = "download" src="assets/images/downloadimage.png" width="60" height="60"></a>
  </div>
</div>
<p><i>*including our 15% service charge</i><p>

</form>





</div>
<script>



</script>

</body>

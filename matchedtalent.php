<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="css/table.css">

</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="main.js"></script>

<?php include("dashnavbar.php");
include("sqlconnect.php");
 ?>

<div style = "margin:20px;">
<p style = "font-size:25px;margin-bottom:0px;">Matched Talent</p>
<p style = "font-size:16px;margin-top:2px;color:grey">Check the talent matched for your request</p>
<hr>
</div>
<div class="table-responsive">

<table class="table">
  <thead>
    <tr>
      <th width="5%">#</th>
      <th width="15%">Name</th>
      <th width="15%">Job Title</th>
      <th width="15%">Industries</th>
      <th width="15%">Company</th>
      <th width="10%">Location</th>
      <th width="10%">Status</th>
      <th width="15%"></th>


    </tr>
  </thead>
  <tbody>

      <?php
      $userid = $_SESSION["userid"];
      $getcompid = mysqli_query($link, "SELECT id,CompanyName FROM Companies WHERE userid = '$userid'");
      $row = mysqli_fetch_array($getcompid);
      $companyid = $row["id"];
      $companyname = $row["CompanyName"];

      $i = 1;
      $getrequests = mysqli_query($link,"SELECT id,FirstName,LastName,JobTitle,Industries,Skills,Country,Cities,Status FROM Employee");
      while($req = mysqli_fetch_array($getrequests)){

       $requestedid = $req["id"];
       $link = "employeeprofile.php?employeeid=".$requestedid;
       echo '<p style = "font-size:25px;margin:10px;margin-bottom:0px;">';
       echo '</p>';
       echo '<tr>';
       echo '<td>';
       echo $i;
       echo '</td>';
       echo '<td>';
       echo $req["FirstName"];
       echo " ";
       echo $req["LastName"];
       echo '</td>';
       echo '<td>';
       echo $req["JobTitle"];
       echo '</td>';
       echo '<td>';
       echo $req["Industries"];
       echo '</td>';
       echo '<td>';
       echo $companyname;
       echo '</td>';

       echo '<td>';
       if($req["Country"]=="India"){
         echo $req["Cities"];
       }
       else{
         echo $req["Country"];
       }
       echo '</td>';
       echo '<td>';
       echo $req["Status"];
       echo '</td>';
       echo '<td><button class="btn btn-primary btnaddemp" onclick="location.href=';?><?php echo "'";echo $link;echo "'";?><?php echo'" style = "margin-top:-8px">See More</button></td>';
       echo '</tr>';

       $i++;

      }


       ?>
  </tbody>
</table>

</div>

</body>

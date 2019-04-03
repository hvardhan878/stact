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
<script src="main.js"></script>
<?php
include("dashnavbar.php");
include("sqlconnect.php");
?>
 <button class="btn btn-primary btnaddemp" onclick ="addemployee()">Add Employee</button>
  <div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Job Titles</th>
        <th>Industries</th>
        <th>Location</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

              <?php
              $userid = $_SESSION["userid"];
              $getcompid = mysqli_query($link, "SELECT id FROM Companies WHERE userid = '$userid'");
              $row = mysqli_fetch_array($getcompid);
              $companyid = $row["id"];

              $i = 1;
              $getrequests = mysqli_query($link,"SELECT id,FirstName,LastName,JobTitle,Industries,Skills,Country,Cities,Status FROM Employee WHERE companyid = '$companyid'");
              while($req = mysqli_fetch_array($getrequests)){
               $requestedid = $req["id"];
               $link = "matchedtalent.php?requestid=".$requestedid;
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

               echo '</tr>';
               $i++;
              }

               ?>


    </tbody>
  </table>

</div>
<script>

function addemployee(){

  window.location.href = "addemployee.php"
}
</script>
</body>

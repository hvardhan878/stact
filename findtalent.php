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
 <button class="btn btn-primary btnaddemp" onclick ="addrequest()">Add Request</button>
  <div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th width="5%">#</th>
        <th width="20%">Title</th>
        <th width="20%">Industries</th>
        <th width="20%">Skills</th>
        <th width="10%">Location</th>
        <th width="10%">Status</th>
        <th width="15%"></th>


      </tr>
    </thead>
    <tbody>

        <?php
        $userid = $_SESSION["userid"];
        $getcompid = mysqli_query($link, "SELECT id FROM Companies WHERE userid = '$userid'");
        $row = mysqli_fetch_array($getcompid);
        $companyid = $row["id"];

        $i = 1;
        $getrequests = mysqli_query($link,"SELECT id,JobTitle,Industries,Skills,Country,Cities,Status FROM Request WHERE companyid = '$companyid'");
        while($req = mysqli_fetch_array($getrequests)){
         $requestedid = $req["id"];
         $link = "matchedtalent.php?requestid=".$requestedid;
         echo '<tr>';
         echo '<td>';
         echo $i;
         echo '</td>';
         echo '<td>';
         echo $req["JobTitle"];
         echo '</td>';
         echo '<td>';
         echo $req["Industries"];
         echo '</td>';
         echo '<td>';
         echo $req["Skills"];
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
         echo '<td><button class="btn btn-primary btnaddemp" onclick="location.href=';?><?php echo "'";echo $link;echo "'";?><?php echo'" style = "margin-top:-8px">See Matched Candidates</button></td>';
         echo '</tr>';
         $i++;
        }


         ?>





    </tbody>
  </table>

</div>
<script>

function addrequest(){

  window.location.href = "addrequest.php"
}

</script>
</body>

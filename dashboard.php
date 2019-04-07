<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">

<style>



.row{
  margin:auto;
  width:98%;


}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
  p{
    font-size: 12px;
  }
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #D3D3D3;
  text-align: left;
  padding: 8px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  width:98%;
  height: 80px;
  margin:auto;
  margin-bottom: 10px;
  background-color: #fff;
}
.card:hover{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  width:96%;

  margin:auto;
  margin-bottom: 10px;
  background-color: #fff;
  cursor: pointer;


}
.industries{

  margin-top: -8px;
}
.notification{

}
.btnaddemp:hover{
border:1px solid #000;
background:#fff;
color:#000;
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

<?php
include("dashnavbar.php");
include("sqlconnect.php");
$createnotification =  "CREATE TABLE Notifications(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    companyid INT(10) UNSIGNED NOT NULL,
    type VARCHAR(50) NOT NULL,
    notification LONGTEXT NOT NULL,
    reg_date TIMESTAMP
  )";
  //type = employeerequest,approved

  if ($link->query($createnotification) === TRUE) {
      echo "Table created successfully";
  } else {
      //echo "Error creating table: " . $link->error;
  }



 ?>

<div style = "margin:20px;">
<p style = "font-size:25px;margin-bottom:0px;"> Notifications</p>
<p style = "font-size:16px;margin-top:2px;color:grey">You will be notified here whenever there is any update</p>
<hr>
<table>
      <?php
      $userid = $_SESSION["userid"];
      $getcompid = mysqli_query($link, "SELECT id,CompanyName FROM Companies WHERE userid = '$userid'");
      $row = mysqli_fetch_array($getcompid);
      $companyid = $row["id"];
      $companyname = $row["CompanyName"];

      $i = 1;
      $getrequests = mysqli_query($link,"SELECT * FROM Notifications WHERE companyid = '$companyid'");
      while($req = mysqli_fetch_array($getrequests)){




       echo '<tr>';
       echo '<div class="row">';

       echo '<div class="card">';


       echo '<p>';
       echo $req["notification"];
       echo '</p>';
       echo '<p style = "font-size:12px;margin-top:-8px;color:grey">';
       echo $req["reg_date"];
       echo '</p>';





       echo '</div>';


       echo '</div>';
       echo '</tr>';


       $i++;

      }


       ?>




</table>


</div>





</body>

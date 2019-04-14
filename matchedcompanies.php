<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 33%;
  padding: 10px;
  height: 220px;
  margin-bottom: 8px;

  /* Should be removed. Only for demonstration */
}

.row{
  margin:auto;
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
  height: 220px;
  background-color: #fff;
}
.industries{

  margin-top: -8px;
}


</style>

</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>

<?php include("dashnavbar.php");

    if(isset($_POST["requestid"]))
    {
      $requestid = $_POST["requestid"];

    }


?>

<!--Grid View-->
<div style = "margin:20px;">
<p style = "font-size:25px;margin-bottom:0px;"> Select the companies you want to work with</p>
<p style = "font-size:16px;margin-top:2px;color:grey"> This is to ensure that there is no conflict of interest </p>
<hr>
</div>

<!--table-->
<form method = "post">

<table>
  <tr>
    <div class="row">
      
      <?php
      include("sqlconnect.php");
      $userid = $_SESSION["userid"];  

      $getcompid = mysqli_query($link, "SELECT id FROM Companies WHERE userid = '$userid'");
      $row = mysqli_fetch_array($getcompid);
      $companyid = $row["id"];
 
      $sql1 = "SELECT * FROM request WHERE `companyid` = '$companyid'";
      $result = mysqli_query($link, $sql1);
      $temp_arr = array();
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $skills = $row["Skills"];
            $skills_required_by_company = explode (",", $skills); 
            foreach($skills_required_by_company as $array_ele){
              array_push($temp_arr,trim($array_ele));
            }
          }
      }else{
            echo "0 results";
      }
      $unique_skills_required_by_company =array_unique($temp_arr);
      //print_r($unique_skills_required_by_company);
      
      $sql2 = "SELECT * FROM employee";
      $result2 = mysqli_query($link, $sql2);
      //$temp_arr = array();
      $flag1=0;
      if (mysqli_num_rows($result2) > 0) {
          while($row2 = mysqli_fetch_assoc($result2)) {
            
            $companyid = $row2['companyid'];
            $skills2 = $row2['Skills'];
            $employee_skills = explode(',',$skills2);
            
            foreach($temp_arr as $array_ele2){
              foreach($employee_skills as $skill_req){
                if(trim($skill_req) == trim($array_ele2)){
                  $flag1=1;
                  break;
                }
              }

            $sql3 = "SELECT * FROM companies WHERE `id` = '$companyid'";
            $result3 = mysqli_query($link, $sql3);
            $array_com = array();
            if(mysqli_num_rows($result3)>0) {
              while($row3 = mysqli_fetch_assoc($result3)) {
                $company_name = $row3['CompanyName']; 
                array_push($array_com,trim($company_name));
              }  
            }
           $array_com_final = array_unique($array_com);
           
}

}
           foreach($array_com_final as $com_name){
              

              $sql4 = "SELECT * FROM companies WHERE `CompanyName` = '$com_name'";
              $result4 = mysqli_query($link, $sql4);
              while($row4 = mysqli_fetch_assoc($result4)){
                ?>


<div class="column">
        <div class="card">
          <h3><?php echo $row4['CompanyName']?></h3>
           <p style = "font-size:16px;color:grey;"><?php echo $row4['Address'], " , ".$row4["Country"]?></p>
           <p class="industries">Industries</p>
           <p class = "industries"><?php echo $row4['Industries']?></p>
           <label class="form-check-label" style="margin-top:10px;margin-left:20px;">
           <input type="checkbox" class="form-check-input" value="">Select
           </label>
        </div>
      </div>



<?php

              }
           }

            



      }
    



      ?>

      

      
   


    </div>
  </tr>

</table>


<div class="form-group row" style="margin-top:30px">
  <div class="col-sm-10">
    <button type="button" class="btn btn-primary btnaddemp" onclick = "back()">Back to Request List</button>
    <button type="submit" id = "save" class="btn btn-primary btnaddemp">Submit</button>

  </div>
</div>
<form>
  <script>
  function back(){
   window.location.href = "findtalent.php";

  }
  </script>

</body>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<style>
/* Create two equal columns that floats next to each other */
.column {
 margin-top: 40px;
  width: 33%;
  padding: 10px;
  height: 180px;
  margin-bottom: 0px;

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

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  height: 180px;
  background-color: #fff;
}
.industries{

  margin-top: -8px;
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
//  echo  $_GET["requestid"];
if(isset($_GET["requestid"]))
{
  $requestid = $_GET["requestid"];


}
$sql = mysqli_query($link,"SELECT * FROM Notifications WHERE id ='$requestid'");
$row = mysqli_fetch_array($sql);
?>

<div style = "margin:20px;">
<p style = "font-size:25px;margin-bottom:0px;">Approve Access</p>
<p style = "font-size:16px;margin-top:2px;color:grey">You can choose which companies can see the profiles of your employees. We do this to avoid conflict of interest.</p>
<hr>
<form method = "post" action="actionapproveaccess.php">
<div class="card">
          <h3>Amazon</h3>

         <p style = "font-size:16px;color:grey;">Location</p>
         <input name = "companyid" value = '<?php echo $row["reqcompanyid"] ?>'hidden>
              <input name = "requestid" value = '<?php echo $requestid ?>' hidden>

           <p class="industries">Industries</p>
           <p class = "industries">Banking, Technology, Insurance</p>

        </div>
        <div class="form-group row" style="margin:left:-10px;margin-top:10px">
          <div class="col-sm-10">
            <button type="submit" name="action" value="approve" class="btn btn-primary btnaddemp">Approve</button>
            <button type="submit" name="action" value="decline" class="btn btn-primary btnaddemp">Decline</button>

          </div>
        </div>
</form>

</div>





</body>
</html>

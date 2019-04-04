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

    if(isset($_GET["requestid"]))
    {
      $requestid = $_GET["requestid"];
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
      <div class="column">

        <div class="card">
          <h3>Amazon</h3>

         <p style = "font-size:16px;color:grey;">Location</p>

           <p class="industries">Industries</p>
           <p class = "industries">Banking, Technology, Insurance</p>
           <label class="form-check-label" style="margin-top:10px;margin-left:20px;">
           <input type="checkbox" class="form-check-input" value="">Select
           </label>
        </div>


      </div>
      <div class="column">
        <div class="card">
           <h3>Facebook</h3>
           <p style = "font-size:16px;color:grey">Location</p>
           <p class = "industries">Industries</p>
           <p class = "industries">Banking, Technology, Insurance</p>
           <label class="form-check-label" style="margin-top:10px;margin-left:20px;">
           <input type="checkbox" class="form-check-input" value="">Select
           </label>
        </div>
      </div>
      <div class="column">
        <div class="card">
           <h3>Google</h3>
           <p style = "font-size:16px;color:grey">Location</p>
           <p class = "industries">Industries</p>
           <p class = "industries">Banking, Technology, Insurance</p>
           <label class="form-check-label" style="margin-top:10px;margin-left:20px;">
           <input type="checkbox" class="form-check-input" value="">Select
           </label>
        </div>
      </div>
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

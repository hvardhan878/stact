<?php
include("sqlconnect.php");

session_start();

 $userid = $_SESSION["userid"];
   $companyid = isset($_POST["companyid"]) ? $_POST["companyid"] : '';
   $requestid = isset($_POST["requestid"]) ? $_POST["requestid"] : '';

 $getcompid = mysqli_query($link, "SELECT id,CompanyName FROM Companies WHERE userid = '$userid'");
 $row = mysqli_fetch_array($getcompid);
 $reqcompanyid = $row["id"];
 $reqcompanyname = $row["CompanyName"];
 //echo $_POST['action'];
if($_POST['action'] == 'approve'){
  echo "test";

$sqladd = "INSERT INTO Notifications (companyid,reqcompanyid,type,notification) VALUES (?,?,?,?)";
  if($stmt = mysqli_prepare($link, $sqladd)){
    echo "test2";
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "iiss",$param_companyid,$param_reqcompanyid,$param_type,$param_notification);

               $param_companyid = $companyid;
               $param_reqcompanyid = $reqcompanyid;
               $param_type = "approved";
               $param_notification = $reqcompanyname." has approved your request to access its employees. Click to find talent.";




              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){

                  echo '<script> alert("Approved successfully");
                 window.location.href = "dashboard.php";

                  </script>';


              } else{
                  echo $stmt->error;
                  echo "Something went wrong. Please try again later.";
              }
          }

          // Close statement
          mysqli_stmt_close($stmt);




}


$sqldel = "DELETE FROM Notifications WHERE id = '$requestid'";
$link->query($sqldel);

if($_POST['action'] == 'decline'){
  echo '<script> alert("Declined successfully");
 window.location.href = "dashboard.php";

  </script>';


}




$link->close();


 ?>

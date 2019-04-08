<?php
include("sqlconnect.php");

session_start();

 $userid = $_SESSION["userid"];

 $getcompid = mysqli_query($link, "SELECT id,CompanyName FROM Companies WHERE userid = '$userid'");
 $row = mysqli_fetch_array($getcompid);
 $reqcompanyid = $row["id"];
 $reqcompanyname = $row["CompanyName"];

if(isset($_POST["checkboxPort"]))
{
  //$checkboxes = $_POST["checkboxes"];
//  print_r($_POST["checkboxPort"]);
for ($i = 0; $i < count($_POST["checkboxPort"]); $i++){

      $companyid = $_POST["checkboxPort"][$i];
      $sqladd = "INSERT INTO Notifications (companyid,reqcompanyid,type,notification) VALUES (?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sqladd)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "iiss",$param_companyid,$param_reqcompanyid,$param_type,$param_notification);

                     $param_companyid = $companyid;
                     $param_reqcompanyid = $reqcompanyid;
                     $param_type = "employeerequest";
                     $param_notification = $reqcompanyname." is requesting access to your employees. Click to approve/decline";




                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){

                        echo '<script> alert("Request sent");
                        window.location.href = "findtalent.php";

                        </script>';


                    } else{
                        echo $stmt->error;
                        echo "Something went wrong. Please try again later.";
                    }
                }

                // Close statement
                mysqli_stmt_close($stmt);




    }
}
      $link->close();
 ?>

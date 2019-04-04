<?
include("sqlconnect.php");
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$new_password = isset($_POST["newpassword"]) ? $_POST["newpassword"] : '';
$confirmnewpassword = isset($_POST["confirmnewpassword"]) ? $_POST["confirmnewpassword"] : '';
if($new_password != $confirmnewpassword){
  $pass_err = "Passwords don't match";
  $_SESSION["passerr"] = $pass_err;
  //echo $pass_err;
  header("location:profile.php");


}
else{
$sql = "UPDATE Users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["userid"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                $_SESSION["Password"] = $new_password;
                $_SESSION["passerr"] = "";
                header("location:profile.php");

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);


    // Close connection
    mysqli_close($link);
}

 ?>

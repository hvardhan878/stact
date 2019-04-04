<?php
include("sqlconnect.php");
session_start();
$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$confirmpassword = isset($_POST["confirmpassword"]) ? $_POST["confirmpassword"] : '';
if($password != $confirmpassword){
  $pass_err = "Passwords don't match";
  $_SESSION["passerr"] = "*".$pass_err;
  header("Location: signup.php");

}

else{
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format";
  $_SESSION["emailerr"] = "*".$email_err;
  header("Location: signup.php");
}
else {

$sql = "SELECT id FROM Users WHERE Email = ?";

     if($stmt1 = mysqli_prepare($link, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt1, "s", $param_email);

         // Set parameters
         $param_email = $email;

         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt1)){
             /* store result */
             mysqli_stmt_store_result($stmt1);

             if(mysqli_stmt_num_rows($stmt1) == 1){
                 $email_err = "This email is already taken.";
                 $_SESSION["emailerr"] = "*".$email_err;
                  header("Location: signup.php");
             } else{
                 $email = isset($_POST["email"]) ? $_POST["email"] : '';


                 $sqladd = "INSERT INTO Users (FirstName, LastName, Email, Password, companyid, CompanyRegister) VALUES (?,?,?,?,?,?)";
                   if($stmt = mysqli_prepare($link, $sqladd)){
                               // Bind variables to the prepared statement as parameters
                               mysqli_stmt_bind_param($stmt, "ssssis", $param_FirstName, $param_LastName,$param_Email,$param_Password,$param_companyid,$param_CompanyRegister);

                               // Set parameters
                               $param_FirstName = $firstname;
                               $param_LastName = $lastname;
                               $param_Email = $email;
                               $param_Password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                               $param_CompanyRegister="false";


                               // Attempt to execute the prepared statement
                               if(mysqli_stmt_execute($stmt)){
                                   // Redirect to login page\

                                   $_SESSION["loggedin"] = true;
                                   $sql = mysqli_query($link,"SELECT id FROM Users WHERE Email = '$email'");
                                   $row = mysqli_fetch_array($sql);
                                 //  echo $row["id"];
                                   $_SESSION["userid"] = $row["id"];
                                   $_SESSION["Email"] = $email;
                                   $_SESSION["FirstName"] = $firstname;
                                   $_SESSION["LastName"] = $lastname;
                                   $_SESSION["Password"] = $password;
                                   $_SESSION["CompanyRegister"] = "false";
                                   $_SESSION["passerr"] = "";
                                   header("Location: companyregistration.php");
                               } else{
                                   echo $stmt->error;
                                   echo "Something went wrong. Please try again later.";
                               }
                           }

                           // Close statement
                           mysqli_stmt_close($stmt);
             }
         } else{
             echo "Oops! Something went wrong. Please try again later.";
         }
     }

     // Close statement
     mysqli_stmt_close($stmt1);






}
}

$link->close();




 ?>

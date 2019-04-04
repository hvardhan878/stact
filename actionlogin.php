<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: companyregistration.php");
    exit;
}
include ("sqlconnect.php");
$Email = isset($_POST["email"]) ? $_POST["email"] : '';
$checkPassword = isset($_POST["password"]) ? $_POST["password"] : '';
$sql = "SELECT * FROM Users WHERE Email = ?";


   if($stmt = mysqli_prepare($link, $sql)){
       // Bind variables to the prepared statement as parameters
       mysqli_stmt_bind_param($stmt, "s", $param_Email);

       // Set parameters
       $param_Email = $Email;

       // Attempt to execute the prepared statement
       if(mysqli_stmt_execute($stmt)){
           // Store result
           mysqli_stmt_store_result($stmt);

           // Check if username exists, if yes then verify password
           if(mysqli_stmt_num_rows($stmt) == 1){
               // Bind result variables
               mysqli_stmt_bind_result($stmt, $id, $FirstName,$LastName,$Email,$Password,$companyid,$CompanyRegister);
               if(mysqli_stmt_fetch($stmt)){
                   if(password_verify($checkPassword, $Password)){
                       // Password is correct, so start a new session
                       session_start();

                       // Store data in session variables
                       $_SESSION["loggedin"] = true;
                       $_SESSION["userid"] = $id;
                       $_SESSION["Email"] = $Email;
                       $_SESSION["FirstName"] = $FirstName;
                       $_SESSION["LastName"] = $LastName;
                       $_SESSION["Password"] = $checkPassword;
                       $_SESSION["CompanyRegister"] = $CompanyRegister;
                       $_SESSION["passerr"] = "";



                       // Redirect user to welcome page
                       header("location: companyregistration.php");
                   } else{
                       // Display an error message if password is not valid
                        $_SESSION["passerr"] = " *Wrong Username or Password";
                         header("location: login.php");
                   }
               }
           } else{
               // Display an error message if username doesn't exist
               $_SESSION["passerr"] = " *Wrong Username or Password";
                header("location: login.php");
            
           }
       } else{
           echo $stmt->error;
           echo "Oops! Something went wrong. Please try again later.";
       }
   }

   // Close statement
   mysqli_stmt_close($stmt);



 ?>

<?php
include("sqlconnect.php");
$Email = isset($_POST["email"]) ? $_POST["email"] : '';

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

                 $expFormat = mktime(
                   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                 );
                 $expDate = date("Y-m-d H:i:s",$expFormat);
                 $key = md5(2418*2+$Email);
                 $addKey = substr(md5(uniqid(rand(),1)),3,10);
                 $key = $key . $addKey;
                 mysqli_query($link,
                 "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
                 VALUES ('".$Email."', '".$key."', '".$expDate."');");
                 $to = $Email;
                 $subject = "Reset Password";

                 $message = '<p>resetpassword.php?key='.$key.'&email='.$Email.'&action=reset</a></p>'; //change to website url

                 // Always set content-type when sending HTML email
                 $headers = "MIME-Version: 1.0" . "\r\n";
                 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                 // More headers
                 $headers .= 'From: <noreply@stact.com>' . "\r\n";


                 if(mail($to,$subject,$message,$headers)){
                   echo "sent";
                 }
                 else {
                   echo "not sent";
                 }

               }
           } else{
               // Display an error message if username doesn't exist
              // $_SESSION["passerr"] = " *Wrong Username or Password";
                header("location: forgotpassword.php");

           }
       } else{
           echo $stmt->error;
           echo "Oops! Something went wrong. Please try again later.";
       }
   }

   // Close statement
   mysqli_stmt_close($stmt);










 ?>

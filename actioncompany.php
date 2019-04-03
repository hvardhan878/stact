<?php
include("sqlconnect.php");
/*
CompanyName VARCHAR(100) NOT NULL,
Country VARCHAR(15) NOT NULL,
Address LONGTEXT NOT NULL,
MajorCities LONGTEXT,
Phone VARCHAR(20) NOT NULL,
RegistrationNumber VARCHAR(80) NOT NULL,
Industries LONGTEXT NOT NULL,
NumberEmployees VARCHAR(10) NOT NULL
*/
session_start();
$MajorCities = "";
$Industries = "";
$userid = $_SESSION["userid"];
$var = "true";
$CompanyName = isset($_POST["company"]) ? $_POST["company"] : '';
$Country = isset($_POST["country"]) ? $_POST["country"] : '';
$Address = isset($_POST["address"]) ? $_POST["address"] : '';
if (isset($_POST['majorcities'])) {
 for ($i = 0; $i < count($_POST['majorcities']); $i++){
    if($i<count($_POST['majorcities']) - 1){
      $MajorCities = $MajorCities.$_POST['majorcities'][$i].",";
    }
    else{
      $MajorCities = $MajorCities.$_POST['majorcities'][$i];
    }
 }
}
$Phone = isset($_POST["phone"]) ? $_POST["phone"] : '';
$RegistrationNumber = isset($_POST["compreg"]) ? $_POST["compreg"] : '';
if (isset($_POST['industries'])) {
 for ($i = 0; $i < count($_POST['industries']); $i++){
    if($i<count($_POST['industries']) - 1){
      $Industries = $Industries.$_POST['industries'][$i].",";
    }
    else{
      $Industries = $Industries.$_POST['industries'][$i];
    }
 }
}
$NumberEmployees = isset($_POST["employees"]) ? $_POST["employees"] : '';
//echo $MajorCities;
$sqladd = "INSERT INTO Companies (userid,CompanyName, Country, Address, MajorCities, Phone, RegistrationNumber, Industries, NumberEmployees) VALUES (?,?,?,?,?,?,?,?,?)";
  if($stmt = mysqli_prepare($link, $sqladd)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "issssssss",$param_userid,$param_CompanyName, $param_Country,$param_Address,$param_MajorCities,$param_Phone,$param_RegistrationNumber,$param_Industries,$param_NumberEmployees);

              // Set parameters
              $param_userid = $userid;
              $param_CompanyName = $CompanyName;
              $param_Country = $Country;
              $param_Address = $Address;
              $param_MajorCities = $MajorCities;
              $param_Phone = $Phone;
              $param_RegistrationNumber = $RegistrationNumber;
              $param_Industries = $Industries;
              $param_NumberEmployees = $NumberEmployees;


              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Redirect to dashboard
                  $comp = mysqli_query($link,"SELECT id FROM Companies WHERE userid = '$userid'");
                  $row = mysqli_fetch_array($comp);
                  $companyid = $row["id"];
                  $_SESSION["CompanyRegister"] = "true";
                  $sql = "UPDATE Users SET companyid = '" .$companyid. "', CompanyRegister = '" .$var. "' WHERE id='$userid'";
                  if (mysqli_query($link, $sql)) {
                    echo "Record updated successfully";
                  } else {
                    echo "Error updating record: " . mysqli_error($link);
                  }

                   header("Location: dashboard.php");
              } else{
                  echo $stmt->error;
                  echo "Something went wrong. Please try again later.";
              }
          }

          // Close statement
          mysqli_stmt_close($stmt);



$link->close();



 ?>

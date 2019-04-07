<?php
 include("sqlconnect.php");
 session_start();

  $userid = $_SESSION["userid"];

  $getcompid = mysqli_query($link, "SELECT id FROM Companies WHERE userid = '$userid'");
  $row = mysqli_fetch_array($getcompid);
  $companyid = $row["id"];

  $industries = "";
  $cities = "";
  $jobtitle = isset($_POST["jobtitle"]) ? $_POST["jobtitle"] : '';
  $jobdescription = isset($_POST["jobdescription"]) ? $_POST["jobdescription"] : '';
  if (isset($_POST['industries'])) {
   for ($i = 0; $i < count($_POST['industries']); $i++){
      if($i<count($_POST['industries']) - 1){
        $industries = $industries.$_POST['industries'][$i].",";
      }
      else{
        $industries = $industries.$_POST['industries'][$i];
      }
   }
  }
  $experience = isset($_POST["experience"]) ? $_POST["experience"] : '';
  $qualifications = isset($_POST["qualifications"]) ? $_POST["qualifications"] : '';

  if($qualifications=="undefined undefined"){
    $qualifications = "";
  }


  $skills = isset($_POST["skills"]) ? $_POST["skills"] : '';
  $country = isset($_POST["country"]) ? $_POST["country"] : '';
  if (isset($_POST['majorcities'])) {
   for ($i = 0; $i < count($_POST['majorcities']); $i++){
      if($i<count($_POST['majorcities']) - 1){
        $cities = $cities.$_POST['majorcities'][$i].",";
      }
      else{
        $cities = $cities.$_POST['majorcities'][$i];
      }
   }
  }
  $startdate = isset($_POST["startdate"]) ? $_POST["startdate"] : '';
  $enddate = isset($_POST["enddate"]) ? $_POST["enddate"] : '';
  $minhr = isset($_POST["minhr"]) ? $_POST["minhr"] : '';
  $maxhr = isset($_POST["maxhr"]) ? $_POST["maxhr"] : '';
  $currency = isset($_POST["currency"]) ? $_POST["currency"] : '';

   /*
   id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   companyid INT(10) UNSIGNED NOT NULL,
   JobTitle VARCHAR(100) NOT NULL,
   JobDescription LONGTEXT NOT NULL,
   Industries LONGTEXT NOT NULL,
   Qualifications LONGTEXT NOT NULL,
   Skills LONGTEXT NOT NULL,
   Country VARCHAR(80) NOT NULL,
   Cities LONGTEXT,
   StartDate VARCHAR(20) NOT NULL,
   EndDate VARCHAR(20) NOT NULL,
   MinHr  INT NOT NULL,
   MaxHr INT NOT NULL,
   Currency VARCHAR(20) NOT NULL,
   Status VARCHAR(10) NOT NULL
   */

  $sqladd = "INSERT INTO Request (companyid, JobTitle, JobDescription, Industries, Qualifications, Skills, Country, Cities, StartDate, EndDate, MinHr, MaxHr, Currency, Status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    if($stmt = mysqli_prepare($link, $sqladd)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "isssssssssiiss",$param_companyid,$param_jobtitle, $param_jobdescription,$param_industries,$param_qualifications,$param_skills,$param_country,$param_cities,$param_startdate,$param_enddate,$param_minhr,$param_maxhr,$param_currency,$param_status);

                // Set parameters
                $param_companyid = $companyid;
                $param_jobtitle = $jobtitle;
                $param_jobdescription = $jobdescription;
                $param_industries = $industries;
                $param_qualifications = $qualifications;
                $param_skills = $skills;
                $param_country = $country;
                $param_cities = $cities;
                $param_startdate = $startdate;
                $param_enddate = $enddate;
                $param_minhr = $minhr;
                $param_maxhr = $maxhr;
                $param_currency = $currency;
                $param_status = "Active";



                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){

                    echo '<script> alert("Successfully added");
                      window.location.href="addrequest.php";
                    </script>';


                } else{
                    echo $stmt->error;
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);


  $link->close();


?>

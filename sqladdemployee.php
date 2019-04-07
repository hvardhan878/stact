<?php
 include("sqlconnect.php");

 session_start();

  $userid = $_SESSION["userid"];

  $getcompid = mysqli_query($link, "SELECT id FROM Companies WHERE userid = '$userid'");
  $row = mysqli_fetch_array($getcompid);
  $companyid = $row["id"];

 function GetImageExtension($type)
    	 {
        if(empty($type)) return false;
        switch($type)
        {
            case 'application/pdf': return '.pdf';
            case 'application/msword': return '.doc';
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': return '.docx';
            default: return false;
        }
      }

$file_type=$_FILES['resume']['type'];
$ext= GetImageExtension($file_type);
$filename = $userid.date("d-m-Y")."-".time().$ext;
$target_path = "assets/files/resume/".$filename;


 if ($file_type=="application/pdf" || $file_type=="application/msword" || $file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") {

  if(move_uploaded_file($_FILES['resume']['tmp_name'], $target_path))

  {

  echo "The file ". basename( $_FILES['resume']['name']). " is uploaded";

  }

  else {

  echo "Problem uploading file";

  }

 }

 else {

  echo "You may only upload PDFs, DOCs or DOCx files.<br>";

 }



  $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
  $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
  $linkedin = isset($_POST["linkedin"]) ? $_POST["linkedin"] : '';
  $jobtitle = isset($_POST["jobtitle"]) ? $_POST["jobtitle"] : '';
  $industries = "";
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
  if($qualifications=="undefined undefined undefined"){
    $qualifications = "";
  }
  $skills = isset($_POST["skills"]) ? $_POST["skills"] : '';
  $country = isset($_POST["country"]) ? $_POST["country"] : '';
  $city = isset($_POST["city"]) ? $_POST["city"] : '';
  $startdate = isset($_POST["startdate"]) ? $_POST["startdate"] : '';
  $enddate = isset($_POST["enddate"]) ? $_POST["enddate"] : '';
  $minhr = isset($_POST["minhr"]) ? $_POST["minhr"] : '';

  $maxhr = isset($_POST["maxhr"]) ? $_POST["maxhr"] : '';
  $currency = isset($_POST["currency"]) ? $_POST["currency"] : '';

  $minhr = $minhr + 0.15*$minhr;
  $maxhr = $maxhr + 0.15*$maxhr;

/*
1.companyid INT(10) UNSIGNED NOT NULL,i
2.FirstName VARCHAR(100) NOT NULL,s
3.LastName VARCHAR(100) NOT NULL,s
4.LinkedIn VARCHAR(500),s
5.JobTitle VARCHAR(200) NOT NULL,s
6.Industries LONGTEXT NOT NULL,s
7.Experience VARCHAR(100) NOT NULL,s
8.Qualifications LONGTEXT,s
9.Skills LONGTEXT NOT NULL,s
10.Country VARCHAR(80) NOT NULL,s
11.Cities LONGTEXT,s
12.StartDate VARCHAR(20) NOT NULL,s
13.EndDate VARCHAR(20) NOT NULL,s
14.MinHr  INT NOT NULL,i
15.MaxHr INT NOT NULL,i
16.Currency VARCHAR(20) NOT NULL,s
17.Status  VARCHAR(20) NOT NULL,s
18.ResumePath VARCHAR(200) NOT NULLs
*/

    $sqladd = "INSERT INTO Employee (companyid, FirstName, LastName, LinkedIn, JobTitle, Industries, Experience, Qualifications, Skills, Country, Cities, StartDate, EndDate, MinHr, MaxHr, Currency, Status, ResumePath) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      if($stmt = mysqli_prepare($link, $sqladd)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "issssssssssssiisss",$param_companyid,$param_firstname,$param_lastname,$param_linkedin,$param_jobtitle,$param_industries,$param_experience,$param_qualifications,$param_skills,$param_country,$param_cities,$param_startdate,$param_enddate,$param_minhr,$param_maxhr,$param_currency,$param_status,$param_resumepath);

                  // Set parameters
                  $param_companyid = $companyid;
                  $param_firstname = $firstname;
                  $param_lastname = $lastname;
                  $param_linkedin = $linkedin;
                  $param_jobtitle = $jobtitle;
                  $param_industries = $industries;
                  $param_experience = $experience;
                  $param_qualifications = $qualifications;
                  $param_skills = $skills;
                  $param_country = $country;
                  $param_cities = $city;
                  $param_startdate = $startdate;
                  $param_enddate = $enddate;
                  $param_minhr = $minhr;
                  $param_maxhr = $maxhr;
                  $param_currency = $currency;
                  $param_status = "Available"; //Available or On Contract
                  $param_resumepath = $target_path;



                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){

                      echo '<script> alert("Successfully added");
                        window.location.href="addemployee.php";
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

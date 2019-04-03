<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="css/employeeform.css">
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

<style>

.btnaddemp:hover{
border:1px solid #000;
background:#fff;
color:#000;
}

</style>
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

<script type="text/javascript" src="bootstrap-multiselect.js"></script>
<?php
include("dashnavbar.php");
include("sqlconnect.php");
$createrequest =  "CREATE TABLE Request(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    companyid INT(10) UNSIGNED NOT NULL,
    JobTitle VARCHAR(100) NOT NULL,
    JobDescription LONGTEXT NOT NULL,
    Industries LONGTEXT NOT NULL,
    Qualifications LONGTEXT,
    Skills LONGTEXT NOT NULL,
    Country VARCHAR(80) NOT NULL,
    Cities LONGTEXT,
    StartDate VARCHAR(20) NOT NULL,
    EndDate VARCHAR(20) NOT NULL,
    MinHr  INT NOT NULL,
    MaxHr INT NOT NULL,
    Currency VARCHAR(20) NOT NULL,
    Status  VARCHAR(20) NOT NULL.
  
  )";
$link->query($createrequest);

$link->close();



?>
<script type="text/javascript">
    $(document).ready(function() {
      $("#qualifications").hide();
      $("#cities").hide();
      $('#example-getting-started').multiselect();
      $("#city").multiselect();
        var x = 0;


	$('#add_btn').click(function(e) {
  	e.preventDefault();
    appendRow(); // appen dnew element to form
    x++; // increment counter for form

  });

	$('#input_wrapper').on('click', '.deleteBtn', function(e) {
  	e.preventDefault();
    var id = e.currentTarget.id; // set the id based on the event 'e'
    $('div[id='+id+']').remove(); //find div based on id and remove
    x--; // decrement the counter for form.


  });

$(function () {
     $('#datetimepicker7').datetimepicker({
       format: 'L'
     });
     $('#datetimepicker8').datetimepicker({
         format: 'L',
         useCurrent: false

     });
     $("#datetimepicker7").on("change.datetimepicker", function (e) {
         $('#datetimepicker8').datetimepicker('minDate', e.date);
     });
     $("#datetimepicker8").on("change.datetimepicker", function (e) {
         $('#datetimepicker7').datetimepicker('maxDate', e.date);
     });
 });


  $("#country").change(function() {
    //console.log($(this).val());
    if($(this).val()=="India")
      $("#cities").show();
    if($(this).val()=="Hong Kong")
      $("#cities").hide();
  });


 $('#save').click(function(e) {

   var formData = $('#test_form').serializeObject(); // serialize the form
   var string;


   if(Array.isArray(formData.degree)) {
     for(var i = 0; i < formData.degree.length; i++) {
       if(i==0){
         string = formData.degree[i] + " " + formData.major[i];
       }
       else{
        string = string + "," + formData.degree[i] + " " + formData.major[i];
       }
      console.log(string);

     };
   } else {
      string = formData.degree + " " + formData.major;
      console.log(string);

   }
    $("#qualifications").val(string);
 });

 function appendRow() {
   $('#input_wrapper').append(
       '<div id="'+x+'" class="form-group" style="display:flex;">' +
         '<div>' +
           '<input type="text" id="'+x+'" class="form-control" name="degree"  placeholder="Degree/Diploma" required>' +
         '</div>' +
         '<div>'+
         '<input type="text" id="'+x+'" class="form-control" name="major"	style = "margin-left:4px;" placeholder="Major" required>'+
         '</div>' +
         '<div>'+
           '<button id="'+x+'" class="btn btn-danger deleteBtn" style = "margin-left:12px;" ><i class="fas fa-trash-alt"></i></button>' +
         '</div>' +
       '</div>');
 }

});

$.fn.serializeObject = function(asString) {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {

    /*  if($('#' + this.name).hasClass('date')) {
          this.value = new Date(this.value).setHours(12);
      }*/

      if (o[this.name] !== undefined) {
          if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
          }
          o[this.name].push(this.value || '');
      } else {
          o[this.name] = this.value || '';
      }
  });
  if (asString) {
      return JSON.stringify(o);
  }
  return o;
};



</script>



<div class = "container">
  <div class = "title">
    <p>Find Talent</p>
  </div>
  <form method = "post" action ="sqlfindtalent.php" id = "test_form">

    <div class="form-group row">
      <label for="inputJobTitle3" class="col-sm-2 col-form-label">Job Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputJobTitle3" name = "jobtitle" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDescription3" class="col-sm-2 col-form-label">Job Description</label>
      <div class="col-sm-10">
        <textarea type="text" class="form-control" style = "height: 100px;" id="inputDescption3"  name = "jobdescription" required></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputIndustries3" class="col-sm-2 col-form-label">Industries</label>
      <div class="col-sm-10">
        <select class = "multiselect" id="example-getting-started" multiple="multiple" name = "industries[]" required>
             <option value="Banking" class ="options">Banking</option>
             <option value="Technology" class ="options">Technology</option>
             <option value="Insurance" class ="options">Insurance</option>
       </select>

      </div>


    </div>
    <div class="form-group row">
      <label for="inputExperience3" class="col-sm-2 col-form-label">Experience</label>
      <div class="col-sm-10">
        <select name = "experience" required>
             <option hidden disabled selected value> </option>
             <option value="<2 years" class ="options"><2 years</option>
             <option value="2-3 years" class ="options">2-3 years</option>
             <option value="4-7 years" class ="options">4-7 years</option>
             <option value="7-10 years" class ="options">7-10 years</option>
             <option value="10+ years" class ="options">10+ years</option>
       </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputQualifications3" class="col-sm-2 col-form-label">Expected Qualifications</label>
      <div class="col-sm-10">
       <div id="input_wrapper"></div>
       <button id="add_btn" class="btn btn-primary btnaddemp" style = "width:500px">Add Expected Qualification (Eg. BS Computer Science)</button>
       <input type="text" id ="qualifications" name ="qualifications">
     </div>
    </div>

    <div class="form-group row">
      <label for="inputSkills3" class="col-sm-2 col-form-label">Skills</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputJobTitle3" placeholder="Skills(Seperate by commas Eg, Microsoft Excel,Java)" name = "skills" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputCountry3" class="col-sm-2 col-form-label">Select Country</label>
      <div class="col-sm-10">
        <select class = "multiselect" name = "country" id ="country" required>
             <option hidden disabled selected value> </option>
             <option value="India" class ="options">India</option>
             <option value="Hong Kong" class ="options">Hong Kong</option>
       </select>
      </div>
    </div>
    <div class="form-group row" id ="cities">
      <label for="inputCity3" class="col-sm-2 col-form-label">Select City</label>
      <div class="col-sm-10">
        <select id="city" multiple="multiple" name = "majorcities[]">
             <option value="New Delhi" class ="options">New Delhi</option>
             <option value="Mumbai" class ="options">Mumbai</option>
       </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputAvailabilitys3" class="col-sm-2 col-form-label">Expected Contract Period</label>
      <div class='col-md-4'>
        <div class="form-group">
          <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" name = "startdate" placeholder="Start Date" data-target="#datetimepicker7" required/>
            <div class="input-group-append" data-target="#datetimepicker7"  data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class='col-md-4'>
          <div class="form-group">
            <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" name = "enddate" placeholder="End Date" data-target="#datetimepicker8" required/>
              <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group row">
      <label for="inputRatesPerHour3" class="col-sm-2 col-form-label">Currency</label>
      <div class="col-md-2">
        <select name = "currency" style = "width:150px;" required>
             <option hidden disabled selected value> </option>
             <option value="INR" class ="options">INR</option>
             <option value="HKD" class ="options">HKD</option>
       </select>
     </div>
   </div>
    <div class="form-group row">
      <label for="inputRatesPerHour3" class="col-sm-2 col-form-label">Expected Rates Per Hour</label>
      <div class="col-md-2">
      	  <input class="form-control" style = "width:150px;"  id="minhr" name = "minhr" placeholder="min/hr" type="number" required>
     </div>

     <div class="col-md-2">
        <input class="form-control" style = "width:150px;" id="maxhr" name = "maxhr" placeholder="max/hr" type="number" required>
     </div>
   </div>


    <div class="form-group row">
      <div class="col-sm-10">
        <button type="button" class="btn btn-primary btnaddemp" onclick = "backtofind()">Back to Request List</button>
        <button type="submit" id = "save" class="btn btn-primary btnaddemp">Submit</button>

      </div>
    </div>
  </form>



</div>

<script>
function backtofind(){
 window.location.href = "findtalent.php";

}
</script>

</body>

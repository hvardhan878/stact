<form>
<div class="form-group row">
  <label for="staticfirstname" class="col-sm-2 col-form-label">First Name</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="firstname" value="<?php echo $_SESSION["FirstName"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label for="staticlastname" class="col-sm-2 col-form-label">Last Name</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="lastname" value="<?php echo $_SESSION["LastName"];?>" disabled>
  </div>
</div>
<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control" id="email" value="<?php echo $_SESSION["Email"];?>" disabled>
  </div>
</div>

</form>

<form action = "actionresetpassword.php" method = "post">
<div class="form-group row">
  <label for="staticfirstname" class="col-sm-2 col-form-label">Current Password</label>
  <div class="col-sm-10">
    <input type="password"  class="form-control" id="password" value="<?php echo $_SESSION["Password"];?>" required>
  </div>
</div>
<div class="form-group row">
  <label for="staticnewpassword" class="col-sm-2 col-form-label">New Password</label>
  <div class="col-sm-10">
    <input type="password"  class="form-control" id="newpassword" name = "newpassword">
  </div>
</div>
<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Confirm New Password</label>
  <div class="col-sm-10">
    <input type="password"  class="form-control" id="confirmnewpassword" name = "confirmnewpassword">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-10">

    <button type="submit" class="btn btn-primary btnaddemp">Update Password</button>

  </div>

</form>

<?php session_start();?>
<nav class="navbar navbar-expand-md">
  <a class="navbar-brand" href="#"><img src="assets/images/stactlogo.png" title="" style="height: 4rem;"></a>
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main-navigation">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="employee.php">Your Employees</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findtalent.php">Find Talent</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <?php echo '<button class="btn btn-secondary dropdown-toggle" style = "background:#2D143B;margin-right:20px"type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
               echo htmlspecialchars($_SESSION["Email"]);
               echo '</button>';?>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </div>
        </li>
    </ul>
  </div>
</nav>

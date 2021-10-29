<?php session_start();
    if(isset($_GET['logout'])){
      session_unset();
      session_destroy();
      header("location: /hospital/admin/login.php");
    }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/hospital/index.php">Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['admin'])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/doctors/add.php">Add Doctor</a>
          <a class="dropdown-item" href="/hospital/doctors/list.php">List Doctors</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Patients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/patients/add.php">Add Patient</a>
          <a class="dropdown-item" href="/hospital/patients/list.php">List Patients</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add Admins
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/admin/addadmin.php">Add Admin</a>
        </div>
      </li>
    </ul>
    <form action="">
    <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>

    </form>
    <?php else : ?>
      </ul>
    <a href="/hospital/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
    <?php endif; ?>
  </div>
</nav>
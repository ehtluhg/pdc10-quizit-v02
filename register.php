<?php
include('vendor/autoload.php');
require('init.php');

use App\User;

?>

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Sign Up
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-design-system.css?v=1.0.9" rel="stylesheet" />
</head>

<body class="contact-us">
 
<?php include 'include/navbar.php' ?>

  <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
  <header>
    <div class="page-header min-vh-85">
      <div>
        <img class="position-absolute fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block border-radius-section border-top-end-radius-0 border-top-start-radius-0 border-bottom-end-radius-0" src="assets/img/register.jpg" style="object-fit: cover" alt="image">
      </div>
      <div class="container mt-6">
        <div class="row">
          <div class="col-lg-7 d-flex justify-content-center flex-column">
            <div class="card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="text-center">
                <h3 class="text-gradient text-primary">Register Now</h3>
                <p class="mb-0">
                  Enter the following details to register
                </p>
              </div>
              <div class="card-body">
                <form role="form" method="POST">
                  <div class="row g-2 mb-3">
                    <div class="col-md">
                      <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First Name">
                    </div>
                    <div class="col-md">
                      <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="mb-3">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                  </div>
                  <div class="mb-3">
                    <input type="email" name="email_address" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <div class="text-center">
                    <button type="submit" value="Register" name="register" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Register</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Already have an account?
                  <a href="sign-in.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <!-- -------- END HEADER 8 w/ card over right bg image ------- -->
 <?php include 'include/footer.php' ?>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>
</body>

</html>

<?php

if (isset($_POST['register'])) {


  $registerUser = new User($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email_address'], $_POST['password']);
  $registerUser->setConnection($connection);
  $registerUser->save();
  echo "<script type='text/javascript'> document.location = 'sign-in.php' </script>";
  exit();
}

?>
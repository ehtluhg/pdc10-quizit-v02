<?php
include('vendor/autoload.php');
require('init.php');

use App\Card;

session_start();

$set_id = $_GET['set_id'];
$addCards = new Card('');
$addCards->setConnection($connection);
$cards = $addCards->checkAnswers($set_id);
$setName = $addCards->getSetName($set_id);

?>

<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">

  <title>



    QuizIt


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
  <link href="assets/css/custom.css" rel="stylesheet" />



</head>

<body class="index-page">

  <style>
    .text-gradient.text-primary {
      background-image: linear-gradient(310deg, #47e2d0, #47bde2);
    }

    .bg-gradient-primary {
      background-image: linear-gradient(310deg, #47e2d0, #47bde2 100%);
    }

    svg.text-primary .color-background {
      fill: #47bde2;
    }

    .text-primary {
      color: #47e2d0 !important;
    }

    .bg-gradient-primary {
      background-image: linear-gradient(310deg, #47e2d0, #47bde2);
    }

    .form-control:focus {
      border-color: #47bde2;
      box-shadow: inset 0 1px 1px rgba(66, 196, 193, 0.075), 0 0 5px rgba(5, 202, 196, 0.6);
    }
  </style>

  <?php include 'include/navbar.php' ?>

  

  <section class="mt-5 pb-4" id="count-stats">
    <!-- main panel -->
    <div class="container">
      <div class="row">
        <h1 class="d-flex justify-content-center mt-6"> <?php echo $setName['set_name']; ?> </h1>
        <hr>
      </div>
      <div class="row justify-content-center">
        <div class="container-fluid px-0 align-items-center">
          <div class="row py-4 px-4 mt-3">
            <div class="col-12">
              <a href="practice.php?set_id=<?php echo $set_id ?>">
                <button class="btn bg-gradient-primary btn-icon" type="button">
                  <div class="d-flex align-items-center">
                    <i class="fa fa-book me-2" aria-hidden="true"></i>
                    Practice
                  </div>
                </button>
              </a>
              <button type="button" class="btn btn-outline-primary">Export</button>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="container text-center">
            <h1><?php echo 'Score: ' . '<span class="text-gradient text-primary">' . $_GET['score'] . '</span> / ' . $_GET['total'] ?></h1>
            <h3 class="py-5">Well done, <span class="text-gradient text-warning"><?php echo $_SESSION['username'] ?></span>!</h3>
            <hr class="horizontal dark mb-5">
            <?php foreach ($cards as $card) { ?>
              <h5 style="text-align:left;">Question: <?php echo $card['description'] ?></h5>
              <h5 style="text-align:left;">Answer: <strong><?php echo $card['title'] ?></strong></h5>
              <br>
              <hr class="horizontal dark mb-5">
            <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <!-- End Card 3 -->





  <?php include 'include/footer.php' ?>





















  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>




  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="assets/js/plugins/countup.min.js"></script>





  <script src="assets/js/plugins/choices.min.js"></script>





  <script src="assets/js/plugins/prism.min.js"></script>
  <script src="assets/js/plugins/highlight.min.js"></script>





  <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
  <script src="assets/js/plugins/rellax.min.js"></script>
  <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
  <script src="assets/js/plugins/tilt.min.js"></script>
  <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
  <script src="assets/js/plugins/choices.min.js"></script>


  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="assets/js/plugins/parallax.min.js"></script>








  <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>


  <script type="text/javascript">
    if (document.getElementById('state1')) {
      const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('state2')) {
      const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
      if (!countUp1.error) {
        countUp1.start();
      } else {
        console.error(countUp1.error);
      }
    }
    if (document.getElementById('state3')) {
      const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
      if (!countUp2.error) {
        countUp2.start();
      } else {
        console.error(countUp2.error);
      };
    }
  </script>






























</body>

</html>
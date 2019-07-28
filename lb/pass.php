<!DOCTYPE html>
<?php
session_start();

?>


<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>PASS</title>

  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.min.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="../assets/css/docs.min.css" rel="stylesheet">
</head>

<body>
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->

  <!-- End Google Tag Manager (noscript) -->

  <main class="profile-page">
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <div class="shape shape-style-1 shape-primary alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>

    </section>
    <section class="section">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <?php

                  $id=$_SESSION["id"];

                  ?>
                  <img src=<?php echo "https://chart.googleapis.com/chart?chs=200x200&amp;cht=qr&amp;chl=$id&amp;choe=UTF-8"?> class="">

              </div>
              </div>

              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <?php
                  $name=$_SESSION["name"];
                    $add=$_SESSION["Address"];
                    echo "<h1>$name</h1>";
                    echo "<p>$add</p>";


                  ?>
                  </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">


                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>TECHFINIX'19
             <p>A National Level Technical Symposium </p>
              </h3>
              <p style="margin-bottom:0px;margin-top:15px;"><i class="fa fa-map-marker" style="margin-right:10px;"></i>Paavai Engineering College,</p>
              <p style="margin-bottom:0px;">Pachal, Namakkal-637018.</p>
              <p style=""><i class="fa fa-phone" style="margin-right:10px;"></i>+91 9842325188</p>
              <hr>
              <p class="text-center" style="margin-bottom:0px;"><i class="fa fa-envelope-o text-center" style="margin-right:10px;"></i>mail : techfinix19@paavai.edu.in</p>
              <p class="text-center" style="margin-bottom:3px;"><i class="fa fa-link text-center" style="margin-right:10px;"></i>web : pec.paavai.edu.in</p>
            </div>



            <button class="btn btn-outline-primary btn-block btn-lg" type="button" style="margin-top:10px;" onclick="window.print();return false;">Download Ticket</button>

          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Core -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/popper/popper.min.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/vendor/headroom/headroom.min.js"></script>

  <!-- Argon JS -->
  <script src="../assets/js/argon.min.js?v=1.0.1"></script>
</body>

</html>

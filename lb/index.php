<?php
ob_start();
session_start();

include_once 'dbconnect.php';
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ALL ^ E_WARNING);
if (isset($_POST['signup'])) {

  
    $email = trim($_POST['email']);
    $book=trim($_POST['book']);
    
    $year = trim($_POST['year']);
    $date=date("d-m-y");
   



    $stmt = $conn->prepare("SELECT mail FROM event WHERE mail=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) {
        $inc=uniqid();
        $id="techfinix18220".$inc;
        $stmts = $conn->prepare("INSERT INTO event(mail,book,year,regdate,id) VALUES( ?, ?, ?, ?, ?)");
        $stmts->bind_param("sssss",  $email,$book, $year,  $date,$id);
        $res = $stmts->execute();
        $stmts->close();
       $_SESSION["year"]=$year;
       $_SESSION["book"]=$book;
        $_SESSION["id"] = $id;
        $_SESSION["mail"]=$email;
        ?><script>

            window.location.href = "pass.php";
            </script><?php

    } 

}
?>





<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="registration of techfinix">
  <meta name="author" content="PaavaiDevs">
  <title>TECHFINIX'19-REGISTRATION</title>
  <!-- Favicon -->
  <link href="" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="../assets/css/docs.min.css" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="../index.html">
          <img src="../assets/img/brand/white.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="./index.html">
                  <img src="./assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../events.html">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../co-ordinators.html">Co-ordinators</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../gallery.html">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact.html">Contact</a>
            </li>
            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="index.php" target="_blank" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-cloud-download mr-2"></i>
                </span>
                <span class="nav-link-inner--text">JOIN US!!</span>
              </a>
            </li>

</ul>



        </div>
      </div>
    </nav>
  </header>

    <section class="section pb-0 bg-gradient-warning">
          <div class="container">
          <div class="container pt-lg-md">
            <div class="row justify-content-center">
                    <div class="col-lg-5">
                      <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-white pb-5">
                          <div class="text-muted text-center mb-3">
                            <small>Register</small>
                          </div>

              <form method="post" autocomplete="off" >


                      <?php
                      if (isset($errMSG)) {

                          ?>
                          <div class="form-group">
                              <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                                  <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                              </div>
                          </div>
                          <?php
                      }
                      ?>

                     

                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                              <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                          </div>
                      </div>

                     
                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                              <input type="" name="book" class="form-control" placeholder="bookname"
                                     required/>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-education"></span></span>
                              <select class="form-control" id="year"  name="year" onchange="eventchoose();" required>
                                  <option selected="selected" value="" disabled="disabled">Select Your Year</option>
                                  <option value="I">I Year</option>
                                  <option value="II">II Year</option>
                                  <option value="III">III Year</option>
                                  <option value="IV">IV Year</option>
                              </select>
                          </div>
                      </div>

                    
                      <div class="form-group">
                          <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Register</button>
                      </div>

                      <div class="form-group">
                          <hr/>
                      </div>
                  </div>

              </form>
          </div>
          </div>
        </div>
      </div>

</div>




</div>

<!-- SVG separator -->
<div class="separator separator-bottom separator-skew zindex-100">
  <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
  </svg>
</div>

    </section>







      <div class="container">
         <div class="row row-grid align-items-center my-md">
           <div class="col-lg-6">
            <small class="text-black font-weight-bold mb-0 mr-2">*proudly coded by</small>
             <a class="text-black font-weight-bold mb-0 mr-2" href=""> "Paavai DEVS" </a>

           </div>
          <div class="col-lg-6 text-lg-center btn-wrapper">
            <a target="_blank" href="https://twitter.com/" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
              <i class="fa fa-twitter"></i>
            </a>
            <a target="_blank" href="https://www.facebook.com/" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
              <i class="fa fa-facebook-square"></i>
            </a>
            <a target="_blank" href="https://instagram.com" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Follow us">
              <i class="fa fa-instagram"></i>
            </a>

                  <hr>
                  <div class="row align-items-center justify-content-md-between">
                    <div class="col-md-6">
                      <div class="copyright">
                        &copy; 2019
                        <a href="http://paavai.edu.in" target="_blank">Paavai Institutions</a>.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <ul class="nav nav-footer justify-content-end">

                        <li class="nav-item">
                          <a href="http://pec.paavai.edu.in" class="nav-link" target="_blank">About Us</a>
                        </li>


                      </ul>
                    </div>
                  </div>
                  </div>




  <!-- Core -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/popper/popper.min.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.1"></script>
</body>

</html>

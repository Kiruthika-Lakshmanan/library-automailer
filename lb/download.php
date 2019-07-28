<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php'
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techfinix18</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
   </head>

<body>
    <div class="container">
        <div class="card" style="margin-top:10px;">
            <div class="card-body text-center">
                <h4 class="card-title text-center" style="text-style:bold">TECHFINIX'18 - 2.0</h4>
                <h6 class="text-muted card-subtitle mb-2 text-center">National Level Technical Symposium 28 &amp; 29 Sep 2018</h6>
                <div class="card"></div>

                <?php
                $id = $_GET['id'];
                $query = "SELECT * from event where id = '$id'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $row = mysqli_fetch_row($result);
                $name = $row[0];
                $add = $row[5]."<br>".$row[3];
                echo "<h1>$name</h1>";
                echo "<p>$add</p>";
                ?>
                <img src=<?php echo "https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl=$id&amp;choe=UTF-8"?> class="">
                <p style="margin-bottom:0px;margin-top:15px;"><i class="fa fa-map-marker" style="margin-right:10px;"></i>Paavai Engineering College,</p>
                <p style="margin-bottom:0px;">Pachal, Namakkal-637018.</p>
                <p style=""><i class="fa fa-phone" style="margin-right:10px;"></i>+91 9842325188</p>
                <hr>
                <p class="text-center" style="margin-bottom:0px;"><i class="fa fa-envelope-o text-center" style="margin-right:10px;"></i>mail : techfinix18@paavai.edu.in</p>
                <p class="text-center" style="margin-bottom:3px;"><i class="fa fa-link text-center" style="margin-right:10px;"></i>web : pec.paavai.edu.in</p>
            </div>
        </div>
    </div><button class="btn btn-outline-primary btn-block btn-lg" type="button" style="margin-top:10px;" onclick="window.print();return false;">Download Ticket</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>

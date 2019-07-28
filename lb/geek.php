<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);



if (isset($_POST['signup'])) {

    $email = trim($_POST['email']);
    
   



    $stmt = $conn->prepare("SELECT mail FROM event WHERE mail=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) {
        $inc=uniqid();
        $id="techfinix18220".$inc;
        $stmts = $conn->prepare("INSERT INTO event(mail,id) VALUES( ?,?)");
        $stmts->bind_param("ss", $email,$id);
        $res = $stmts->execute();
        $stmts->close();

        $_SESSION["id"] = $id;
        $_SESSION["mail"]=$email;
        ?><script>

            window.location.href = "send.php";
            </script><?php

    } else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }

}









?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Hello,<?php echo $userRow['email']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Techfinix19 Admin</a>  <div class="container-fluid">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item"><a href="logout.php?logout" class="nav-link"> Logout</a></li>
      <li class="nav-item">	<a href="export-book.php" class="nav-link">Download REgistered details</a></li>
    </ul>
  </div>
</nav>
<br>


<div class="container">
      <div class="alert alert-success" role="alert">
          Hello, <?php echo $userRow['username']; ?>
      </div>
</div>
  <div class="table-responsive">
        <table class="table" >
           <thead>
    				<tr>

      					
    					<th scope="col">mail</th>
    					
          

    				</tr>
            </thead>
    			<?php
                include('db_con.php');

                $stmt=$db_con->prepare('select * from event');
                $stmt->execute();
                $i=1;

    			while($row=$stmt->FETCH(PDO::FETCH_ASSOC)){
    				echo '
             <tbody>
    				<tr>
                  <th scope="row">'.$i.'</th>
    					   
    					    <td>'.$row["mail"].'</td>
    					   
              <td>'.$row["id"].'</td>
    				</tr>
            </tbody>
    				';$i+=1;
    			}
    			?>
    		</table>
</div>
  <form method="post" autocomplete="off" >
  <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                              <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                          </div>
 <div class="form-group">
                          <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Register</button>
                      </div>

</form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

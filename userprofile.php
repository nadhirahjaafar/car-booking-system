<?php

session_start();
require_once('database.php');
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
    $userid = $_SESSION ['id'];

 
}
$stmt = $conn->prepare('SELECT `name`, `ic no`, `phone no`, `driver name`, `driver ic no`, `driver phone no`,  `license`, `license start period`, `license end period`, `role`, `username` FROM users WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($name, $icno, $telno, $driver, $driveric, $drivertel, $license, $start, $end, $role, $username );
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>USER PROFILE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">SPEEDY<span>LUX</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="user.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="user.php#about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="user.php#car" class="nav-link">Our Fleet</a></li>
	          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$_SESSION['username']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="userprofile.php">Profile Setting</a>
          <a class="dropdown-item" href="mybooking.php">My Booking</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">The Most Prestigous Ride in Town</h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
	            <a href="https://luxurylimo.my/wp-content/uploads/2020/10/Luxurylimo-video-compressed.mp4" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

     


    <section class="ftco-section ftco-no-pt bg-light" id="car">
    	<div class="container">
        <div class="container-fluid">
<h1 class=h3 mb-2 text-gray-800></h1><div class='card shadow mb-4'>
                        <div class='card-header py-2'>
                        <h6 class="m-0 font-weight-bold text-primary">User Profile Id: <?=$_SESSION['id']?></h6>
                            
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table class='table table-bordered'  width='100%' cellspacing='0'>
                    
                    </thead><tbody>
                        
                        <tr><td>Full Name </td><td><?=$name?></td></tr>
                        <tr><td>IC Number </td><td><?=$icno?></td></tr>
                        <tr><td>Phone Number </td><td><?=$telno?></td></tr>
                        <tr><td>Driver Name </td><td><?=$driver?></td></tr>
                        <tr><td>Driver IC Number </td><td><?=$driveric?></td></tr>
                        <tr><td>Driver Phone Number </td><td><?=$drivertel?></td></tr>
                        <tr><td>License </td><td><?=$license?></td></tr>
                        <tr><td>License Start Period </td><td><?=$start?></td></tr>
                        <tr><td>License End Period </td><td><?=$end?></td></tr>
                        <tr><td>Role </td><td><?=$role?></td></tr>
                        <tr><td>Username </td><td><?=$_SESSION['username']?></td></tr>
                        
                        </tbody></table>
                     </div>
                     <div class= 'btn-group float-right mt-2' >
                     <a class='btn btn-secondary' href='userupdate.php'> Update </a>
                     <a class='btn btn-primary' href='user.php'> Back </a>
                     
               
                   </div>
                     </div>
                     </div></div>
                <!-- /.container-fluid -->

            </div>
                  
		    					
    					
    
    </section>
   



<footer class="ftco-footer ftco-bg-dark ftco-section"id="contact">
<div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
          <br><br>
    <p>Copyright SpeedyLux &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a></p>
    <div class="ftco-footer-widget mb-4">
      <ul class="ftco-footer-social list-unstyled float-md-center float-center mt-5">
        <li class="ftco-animate" ><a href="mailto:info@luxurylimo.my"><span class="icon-envelope"></span></a></li>
        <li class="ftco-animate"><a href="https://www.facebook.com/luxurylimokl/"><span class="icon-facebook"></span></a></li>
        <li class="ftco-animate"><a href="https://api.whatsapp.com/send/?phone=60178111487&text&app_absent=0"><span class="icon-whatsapp"></span></a></li>
      </ul>
</div> 
</div>
</div>
</div>
</footer>




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

    

</body>
</html>
<?php
session_start();
require_once('database.php');


if(isset($_POST['submit'])) {
	function dateDiffInDays($pickupdate, $dropoffdate) 
	{
		$diff = strtotime($dropoffdate) - strtotime($pickupdate);
		return abs(round($diff / 86400));
	}

	$id = $_POST ['id'];
	$name = strtoupper($_POST ['name']);
	$telno = $_POST ['telno'];
	$icno = $_POST ['icno'];
	$cars = $_POST ['cars'];
	$pickup = $_POST ['pickup'];
	$dropoff= $_POST ['dropoff'];
	$pickupdate = $_POST ['pickupdate'];
	$dropoffdate= $_POST ['dropoffdate'];
	$time = $_POST ['time'];
	$status = ['payment_status'];
    $dateDiff = dateDiffInDays($pickupdate, $dropoffdate);
	if(!empty($_POST['cars'])) {
		if($cars == "Chrysler 300C Strechlimo") {
			if($dateDiff < 1) {
				$price = 1200;
			} elseif($dateDiff > 3 && $dateDiff < 8) {
				$price = 7000;
			} else {
				$price = 8000;
			}
		} elseif($cars == "Rolls-Royce Ghost") {
			if($dateDiff < 1) {
				$price = 1000;
			} elseif($dateDiff > 3 && $dateDiff < 8) {
				$price = 5000;
			} else {
				$price = 6500;
			}
		} elseif($cars == "Mercedes Benz S400h AMG" || $cars == "Mercedes Benz GLC300 AMG") {
			if($dateDiff < 1) {
				$price = 350;
			} elseif($dateDiff > 3 && $dateDiff < 8) {
				$price = 1500;
			} else {
				$price = 2500;
			}
		}  elseif($cars == "Mercedes Benz E250" || $cars == "Mercedes Benz GLC250 AMG" || $cars == "BMW 530e Sport Line" || $cars == "BMW X5 xDrive40e") {
			if($dateDiff < 1) {
				$price = 200;
			} elseif($dateDiff > 3 && $dateDiff < 8) {
				$price = 1000;
			} else {
				$price = 1200;
			}
		} 
	}
	
	$sql= "INSERT INTO booking (`id`, `name`,  `phone no`, `ic no`, `cars`, `pickup location`, `dropoff location`,  `pickup date`, `dropoff date`, `pickup time`, `car price`, `payment_status`)
	VALUES ( '$id','$name',  '$telno',  '$icno', '$cars', '$pickup', '$dropoff', '$pickupdate', '$dropoffdate', '$time', '$price', 'Pending')";
	if ($conn -> query ($sql)=== TRUE) {
	echo '<script type="text/javascript">alert("Your Booking Still Pending. Please Check Your Booking To Make Payment!");window.location=\'mybooking.php\';</script>';
	} else {
	 echo "Error: ". $sql. "<br>". $conn-> error;
	}
	
	}
	$conn -> close();
	
	?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mercedes Benz GLC300 AMG</title>
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
	      <a class="navbar-brand" href="#">SPEEDY<span>LUX</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Available Cars</b>
        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="car1.php">Chrysler 300C Strechlimo</a>
          <a class="dropdown-item" href="car2.php">Rolls-Royce Ghost</a>
          <a class="dropdown-item" href="car3.php">Mercedes Benz S400h AMG</a>
		  <a class="dropdown-item" href="car4.php">Mercedes Benz GLC300 AMG</a>
		  <a class="dropdown-item" href="car5.php">Mercedes Benz E250</a>
		  <a class="dropdown-item" href="car6.php">Mercedes Benz GLC250 AMG</a>
		  <a class="dropdown-item" href="car7.php">BMW 530e Sport Line</a>
		  <a class="dropdown-item" href="car8.php">BMW X5 xDrive40e</a>
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
	            <p style="font-size: 18px;">We provide good quality and luxurious cars to transfer the VVIP to and from Official or Special events in town.</p>
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

	<section class="ftco-section ftco-no-pt bg-light"id="rent">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">

							  <form class="request-form ftco-animate bg-primary" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		          		<h2>Make Your Trip</h2>

						  <div class="form-group">
			    					<label for="" class="label">User ID</label>
			    					<input type="text" class="form-control" id="id" name="id" required="" placeholder="Enter Your ID">
			    				</div>
						  <div class="form-group">
			    					<label for="" class="label">Fullname</label>
			    					<input type="text" class="form-control" id="name" name="name" required="" placeholder="Enter Your Fullname">
			    				</div>

								<div class="form-group">
			    					<label for="" class="label">Phone Number</label>
			    					<input type="text" class="form-control" id="telno" name="telno" required="" placeholder="Enter Your Phone Number">
			    				</div>

								<div class="form-group">
			    					<label for="" class="label">IC Number</label>
			    					<input type="text" class="form-control" id="icno" name="icno" required="" placeholder="Enter Your IC Number">
			    				</div>


								<div class="form-group"  >
								<label for="" class="label">Available Cars</label>
              <select class="form-control"  id="cars" name="cars" required="" >
             
        <option value= "" selected ="selected"> Choose Car</option>
<option value = "Chrysler 300C Strechlimo" style="color:black;">Chrysler 300C Strechlimo</option>
<option value = "Rolls-Royce Ghost" style="color:black;">Rolls-Royce Ghost</option>
<option value = "Mercedes Benz S400h AMG" style="color:black;">Mercedes Benz S400h AMG</option>
<option value = "Mercedes Benz GLC300 AMG" style="color:black;">Mercedes Benz GLC300 AMG</option>
<option value = "Mercedes Benz E250" style="color:black;">Mercedes Benz E250</option>
<option value = "Mercedes Benz GLC250 AMG" style="color:black;">Mercedes Benz GLC250 AMG</option>
<option value = "BMW 530e Sport Line" style="color:black;">BMW 530e Sport Line</option>
<option value = "BMW X5 xDrive40e" style="color:black;">BMW X5 xDrive40e</option>
</select>
            </div>
			<div class="form-group">
								<label for="" class="label">Pick-Up location</label>
								<select class="form-control"  id="pickup" name="pickup" required="" >
								<option value= "" selected ="selected"> Choose Your Pick-up Location</option>
								<option value = "KLIA" style="color:black;">KLIA</option>
								<option value = "Tasik Titiwangsa" style="color:black;">Tasik Titiwangsa</option>
								<option value = "Ampang" style="color:black;">Ampang</option>
								<option value = "Damansara" style="color:black;">Damansara</option>
								<option value = "Cheras" style="color:black;">Cheras</option>
								<option value = "Mont Kiara" style="color:black;">Mont Kiara</option>
								<option value = "KLCC" style="color:black;">KLCC</option>
								<option value = "Putrajaya" style="color:black;">Putrajaya</option>
								<option value = "Putra Height" style="color:black;">Putra Height</option>
								<option value = "Klang" style="color:black;">Klang</option>
								<option value = "Shah Alam" style="color:black;">Shah Alam</option>
</select>
			    				</div>
			    				<div class="form-group">
			    					<label for="" class="label">Drop-off location</label>
			    				<select class="form-control"  id="dropoff" name="dropoff" required="" >
								<option value= "" selected ="selected"> Choose Your Drop-Off Location</option>
								<option value = "The Sentral Residences" style="color:black;">The Sentral Residences</option>
								<option value = "Putrajaya" style="color:black;">Putrajaya</option>
								<option value = "Shah Alam" style="color:black;">Shah Alam</option>
								<option value = "Klang" style="color:black;">Klang</option>
		
</select>
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group">
			                <label for="" class="label">Pick-up date</label>
			                <input type="date" class="form-control" id="pickupdate" name="pickupdate" required=""  placeholder="Date">
			              </div>
			              <div class="form-group ml-2">
			                <label for="" class="label">Drop-off date</label>
			                <input type="date" class="form-control" id="dropoffdate" name="dropoffdate" required=""  placeholder="Date">
			              </div>
		              </div>
		              <div class="form-group">
		                <label for="" class="label">Pick-up time</label>
		                <input type="time" class="form-control" id="time" name="time" required=""  placeholder="Time">
		              </div>
			            <div class="form-group">
						<input class="btn btn-secondary btn-user btn-block" type='submit' name='submit' value='Rent A Car Now'>
			            </div>
			    			





	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="#car" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
 
 
					          
  
     

<section class="ftco-section ftco-car-details">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="car-details">

<body oncontextmenu='return false' class='snippet-body'>
                                <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                <!-- slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active"> <img src="https://luxurylimo.my/wp-content/uploads/2020/02/GLC300-1.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://luxurylimo.my/wp-content/uploads/2020/02/GLC300-2.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://luxurylimo.my/wp-content/uploads/2020/02/GLC300-3.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://luxurylimo.my/wp-content/uploads/2020/02/GLC300-4.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://luxurylimo.my/wp-content/uploads/2020/02/GLC300-5.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://luxurylimo.my/wp-content/uploads/2020/02/GLC300-6.jpg" alt="Hills"> </div>
                    
                </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="text text-center">
    <br>
<span class="subheading">Cheverolet</span>
<h2><b>Mercedes Benz GLC300 AMG</b></h2>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="media-body py-md-4">
<div class="d-flex mb-3 align-items-center">
<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
<div class="text">
<h3 class="heading mb-0 pl-3">
Maximum Mileage / Day
<span>150 KM</span>
</h3>
</div>
</div>
</div>
</div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="media-body py-md-4">
<div class="d-flex mb-3 align-items-center">
<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
<div class="text">
<h3 class="heading mb-0 pl-3">
Transmission
<span>Automatic</span>
</h3>
</div>
</div>
</div>
</div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="media-body py-md-4">
<div class="d-flex mb-3 align-items-center">
<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
<div class="text">
<h3 class="heading mb-0 pl-3">
Seats
<span>4 Adults</span>
</h3>
</div>
</div>
</div>
</div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="media-body py-md-4">
<div class="d-flex mb-3 align-items-center">
<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
<div class="text">
<h3 class="heading mb-0 pl-3">
Luggage
<span>2 Suitcase</span>
</h3>
</div>
</div>
</div>
</div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="media-body py-md-4">
<div class="d-flex mb-3 align-items-center">
<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
<div class="text">
<h3 class="heading mb-0 pl-3">
Fuel
<span>Petrol</span>
</h3>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 pills">
<div class="bd-example bd-example-tabs">
<div class="d-flex justify-content-center">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Fleet Rates</a>
</li>
</ul>
</div>
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
<div class="row">
<div class="col-md-4">
<ul class="features">
<li class="check"><span class="ion-ios-checkmark"></span>THERMOTRONIC Automatic Climate Control</li>
<li class="check"><span class="ion-ios-checkmark"></span>Mercedes Me Connect Services</li>
<li class="check"><span class="ion-ios-checkmark"></span>MBUX Multimedia System with Touch Screen</li>
<li class="check"><span class="ion-ios-checkmark"></span>Parking with 360 Camera</li>
<li class="check"><span class="ion-ios-checkmark"></span>Lane Tracking System</li>
</ul>
</div>

<div class="col-md-4">
<ul class="features">
<li class="check"><span class="ion-ios-checkmark"></span>Burmester Surround System</li>
<li class="check"><span class="ion-ios-checkmark"></span>Air Conditioning</li>
<li class="check"><span class="ion-ios-checkmark"></span>5 Doors SUV</li>
<li class="check"><span class="ion-ios-checkmark"></span>Genuine Leather</li>
<li class="check"><span class="ion-ios-checkmark"></span>Sun Shades</li>
</ul>
</div>
</div>
</div>
<div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
<p>The new GLC Coupe is eye catchingly sporty like never before. With wider aprons, new tailpipe trims and fitted for the first time, LED High Performance headlamps with light design, digital displays and touch screen.</p>
<p>A PURER and more SENSUAL expression of modern luxury.</p>
</div>

<div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
<div class="row">
<div class="col-md-7">



<div class="col-md-12">
<div class="rating-wrap">
<h3 class="head">Rates & Packages</h3>
<div class="wrap">


<p class="star">
<span>Hourly</span>
<span>RM 350</span>
</p>

<p class="star">
<span>Daily</span>
<span>RM 2,500</span>
</p>

<p class="star">
<span>4 - 7 Days</span>
<span>RM 1,500</span>
</p>

<p class="star">
<span>More than 7 Days</span>
<span>Request</span>
</p>

</section>
</div>
                </div>
            </div>
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
   <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="45px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
   
   
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
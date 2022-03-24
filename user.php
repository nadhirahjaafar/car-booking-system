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
    <title>USER LOGIN</title>
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
	      <a class="navbar-brand" href="user.php">SPEEDY<span>LUX</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="user.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="#car" class="nav-link">Our Fleet</a></li>
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
    </section>


	<section class="ftco-section ftco-no-pt bg-light" id="car">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Vehicles</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
    					<div class="item">
							
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/limo.jpg);">
		    					</div>
								
    						
								<div class="text">
		    						<h2 class="mb-0">Chrysler 300C Strechlimo</h2>
		    						<div class="d-flex mb-3">
			    						<p class="cat">Limousine</p>
			    						<span class="price ml-auto">RM1,200 <span>/hour</span></p>
                                        <p class="price ml-auto">RM8,000 <span>/day</span></p>
                                       
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a>   <a href="car1.php"  class="btn btn-secondary py-2 ml-1">Details</a> </p>
									
								
		    					</div>
		    				</div>
							</a>
    					</div>
                        <div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/royce.jpg);">
		    					</div>

		    					<div class="text">
		    						<h2 class="mb-0">Rolls-Royce Ghost</h2>
		    						<div class="d-flex mb-3">
			    						<p class="cat">Cheverolet</p>
			    						<span class="price ml-auto">RM1,000 <span>/hour</span></p>
                                        <p class="price ml-auto">RM6,500 <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car2.php"  class="btn btn-secondary py-2 ml-1">Details</a></p>
							
		    					</div>
		    				</div>
    					</div>
                        <div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/mers-1.jpg);">
		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0">Mercedes Benz S400h AMG</h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat">Cheverolet</span>
                      <span class="price ml-auto">RM350 <span>/hour</span></p>
                      <p class="price ml-auto">RM2,500 <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car3.php"  class="btn btn-secondary py-2 ml-1">Details</a></p>
		    					</div>
		    				</div>
    					</div>
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/mers-2.jpg);">
		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0">Mercedes Benz GLC300 AMG</h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat">Cheverolet</span>
                      <span class="price ml-auto">RM350 <span>/hour</span></p>
                      <p class="price ml-auto">RM2,500 <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car4.php"  class="btn btn-secondary py-2 ml-1">Details</a></p>
		    					</div>
		    				</div>
    					</div>

                <div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/mers-3.jpg);">
		    					</div>
              <div class="text">
                <h2 class="mb-0">Mercedes Benz E250</h2>
                <div class="d-flex mb-3">
                  <p class="cat">Cheverolet</p>
                  <span class="price ml-auto">RM200 <span>/hour</span></p>
                                    <p class="price ml-auto">RM1,200 <span>/day</span></p>
                </div>
                <p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car5.php"  class="btn btn-secondary py-2 ml-1">Details</a></p>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="car-wrap rounded ftco-animate"id="car">
              <div class="img rounded d-flex align-items-end" style="background-image: url(images/mers-4.jpg);">
              </div>
          <div class="text">
            <h2 class="mb-0">Mercedes Benz GLC250 AMG</h2>
            <div class="d-flex mb-3">
              <p class="cat">SUV</p>
              <span class="price ml-auto">RM200 <span>/hour</span></p>
                                <p class="price ml-auto">RM1,200 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car6.php"  class="btn btn-secondary py-2 ml-1">Details</a></p>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="car-wrap rounded ftco-animate">
          <div class="img rounded d-flex align-items-end" style="background-image: url(images/bmw-1.jpg);">
          </div>
      <div class="text">
        <h2 class="mb-0">BMW 530e Sport Line</h2>
        <div class="d-flex mb-3">
          <p class="cat">Cheverolet</p>
          <span class="price ml-auto">RM200 <span>/hour</span></p>
                            <p class="price ml-auto">RM1,200 <span>/day</span></p>
        </div>
        <p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car7.php"  class="btn btn-secondary py-2 ml-1">Details</a></p>
      </div>
    </div>
  </div>

  <div class="item">
    <div class="car-wrap rounded ftco-animate">
      <div class="img rounded d-flex align-items-end" style="background-image: url(images/bmw-2.jpg);">
      </div>
  <div class="text">
    <h2 class="mb-0">BMW X5 xDrive40e</h2>
    <div class="d-flex mb-3">
      <p class="cat">SUV</p>
      <span class="price ml-auto">RM200 <span>/hour</span></p>
                        <p class="price ml-auto">RM1,200 <span>/day</span></p>
    </div>
    <p class="d-flex mb-0 d-block"><a href="#rent" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car8.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
  </div>
</div>
</div>

    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <section class="ftco-section ftco-about" id="about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
              <span class="subheading" style="text-align: center;">About us</span>
            <h2 class ="mb-4" style="text-align: center;">"LUXURYLIMO" <br>
              The Most Prestigious Ride In Town</h2>

            <p style="text-align: center;">We aim to provide a fleet of ultra luxury cars maintained at the highest standards for clients to attend special VVIP events, English tea parties, for Corporate Hire/ Advertising, Photo shooting, Film Making including James Bond of course and not forgetting once in a lifetime Weddings.</p>
            <p style="text-align: center;">Our knowledge and expertise with high-end clients enables us to provide seamless luxurious chauffeured services to even the most discerning client. Our cars are always maintained to a high standard and in pristine condition 24/7. Same applies to our Chauffeurs who are highly trained and values the safety and comfort of our clients first.</p>
            <p style="text-align: center;"> We believe in</p>
            <p style="text-align: center;">“Das Beste oder Nichts”</p>
            <p style="text-align: center;">The Best or Nothing</p>
            
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
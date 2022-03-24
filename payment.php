<?php
   session_start();
    
   include 'database.php';
   if(isset ($_SESSION['login']) and $_SESSION['login']==true){
    $id = $_SESSION['id'];

		if($_SESSION['role']== 'User'){
			$bookid = $_GET["bookid"];
			$id = $_GET["id"];
			$sql = "SELECT * FROM booking WHERE bookid=$bookid AND id=$id";
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$bookid = $row ['bookid'];
					$name = $row ['name'];
					$telno = $row ['phone no'];
					$icno = $row ['ic no'];
					$cars = $row['cars'];
					$price = $row['car price'];
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		} else {
			echo'<script type="text/javascript">alert("You Are Not Login Yet. Please Login!");window.location=\'login.php\';</script>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PAYMENT</title>
    <meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		.table {
  width: 70%;
  margin-left: auto;
  margin-right: auto;
}
td {
  text-align: left;
}
</style>
  </head>

  <body>
    
<div class="container">
<div class="container-fluid">

<br> <h1> <p class="text-center"><b>PAYMENT DETAILS</b></p> </h1>
<hr>

<div class="container-fluid">
                <div class='card shadow mb-6'>
        <div class='card-header py-5'>
            <div class='card-body'>
		
<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	<li class="nav-item"> 
		<a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-credit-card"></i> Credit Card</a></li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
		<i class="fab fa-paypal"></i>  Paypal</a></li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
		<i class="fa fa-university"></i> FPX Online Banking</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane fade show active text-center" id="nav-tab-card">

<table class='table table-bordered'  width='100%' cellspacing='0'>                
    <tbody>
		<tr><td>Booking ID: </td> <td><?php echo $bookid;?></td></tr>
		<tr><td>Name: </td><td><?php echo $name;?></td></tr>
		<tr><td>IC Number: </td><td><?php echo $icno;?></td></tr>
		<tr><td>Car Type: </td><td><?php echo $cars;?></td></tr>
		<tr><td>Total Price: </td> <td><?php echo $price;?></td></tr>
	</tbody>
</table>
<form role="form">
	<a class="btn btn-success mt-1" href="print_invoice.php?pdf=<?php echo $id;?>&bookid=<?php echo $bookid;?>&id=<?php echo $id;?>">Pay</a>
	<a class= "btn btn-secondary float-center mt-1" href="mybooking.php"> Cancel </a>   
</form>
</div> <!-- tab-pane.// -->
<div class="tab-pane fade text-center" id="nav-tab-paypal">

<table class='table table-bordered'  width='80%' cellspacing='0'>                
    <tbody>
		<tr><td>Booking ID:</td> <td><?php echo $bookid;?></td></tr>
		<tr><td>Name: </td><td><?php echo $name;?></td></tr>
		<tr><td>IC Number: </td><td><?php echo $icno;?></td></tr>
		<tr><td>Car Type: </td><td><?php echo $cars;?></td></tr>
		<tr><td>Total Price: </td> <td><?php echo $price;?></td></tr>
	</tbody>
</table>
	<form role="form">
		<a class="btn btn-success mt-1" href="print_invoice.php?pdf=<?php echo $id;?>&bookid=<?php echo $bookid;?>&id=<?php echo $id;?>">Pay</a>
		<a class= "btn btn-secondary float-center mt-1" href="mybooking.php"> Cancel </a>   
	</form>
</div>
<div class="tab-pane fade text-center" id="nav-tab-bank">

<table class='table table-bordered'  width='100%' cellspacing='0'>                
    <tbody>
		<tr><td>Booking ID: </td> <td><?php echo $bookid;?></td></tr>
		<tr><td>Name: </td><td><?php echo $name;?></td></tr>
		<tr><td>IC Number: </td><td><?php echo $icno;?></td></tr>
		<tr><td>Car Type: </td><td><?php echo $cars;?></td></tr>
		<tr><td>Total Price: </td> <td><?php echo $price;?></td></tr>
	</tbody>
</table>
	<form role="form">
		<a class="btn btn-success mt-1" href="print_invoice.php?pdf=<?php echo $id;?>&bookid=<?php echo $bookid;?>&id=<?php echo $id;?>">Pay</a>
		<a class= "btn btn-secondary float-center mt-1" href="mybooking.php"> Cancel </a>   
	</form>
</div> <!-- tab-pane.// -->
</div> <!-- tab-content .// -->

</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> </div>
<!--container end.//-->
<footer>
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
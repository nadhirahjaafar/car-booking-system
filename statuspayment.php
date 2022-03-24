<?php
   session_start();
    
   include 'database.php';
   if(isset ($_SESSION['login']) and $_SESSION['login']==true){
    $id = $_SESSION['id'];

		if($_SESSION['role']== 'admin'){
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
                    $status = $row['payment_status'];
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PAYMENT STATUS</title>

    <!-- Custom fonts for this template-->
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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                
                <div class="sidebar-brand-text mx-3"><p><b>Welcome Back, <?=$_SESSION['username']?>!</b></p></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           

            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user-plus"></i>
      
        <span><b>CLIENTS REGISTRATION</b></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        
            <a class="collapse-item" href="userlist.php">USERS LIST</a>
           
            


        </div>
    </div>
</li>
<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-solid fa-car"></i>
        <span><b>CLIENTS BOOKING</b></span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="bookinglist.php">BOOKING LIST</a>
        
    </div>
</li>
           

            <!-- Sidebar Message -->
            




 <!-- Divider -->
 <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    
</div>
        </ul>
        
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   
	      
                    <a class="navbar-brand"> <b><?php                        
    date_default_timezone_set("Asia/Kuala_Lumpur");
    echo date("l jS \of F Y h:i:s A"); //Returns IST
    
?></b> </a>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
 <!-- Nav Item - Search Dropdown (Visible Only XS) -->
 
                            <!-- Dropdown - Messages -->
                            

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            
                            <!-- Dropdown - Alerts -->
                           
                    
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              
                                <span class="fa fa-user"><b> SPEEDYLUX</b>_<b><?=$_SESSION['role']?></b></i>
                    </span>
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="adminprofile.php">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-black-400"></i>
                                    Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"  >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>


  </head>

<body>
<div class="container">
<br> <h1> <p class="text-center"><b>PAYMENT STATUS</b></p> </h1>
<hr>

<div class="container-fluid">
                <div class='card shadow mb-6'>
        <div class='card-header py-5'>
            <div class='card-body'>


<div class="tab-content">
<div class="tab-pane fade show active text-center" id="nav-tab-card">

<table class='table table-bordered'  width='100%' cellspacing='0'>                
    <tbody>
		<tr><td>Booking ID: </td> <td><?php echo $bookid;?></td></tr>
		<tr><td>Name: </td><td><?php echo $name;?></td></tr>
		<tr><td>IC Number: </td><td><?php echo $icno;?></td></tr>
		<tr><td>Car Type: </td><td><?php echo $cars;?></td></tr>
		<tr><td>Total Price: </td> <td><?php echo $price;?></td></tr>
        <tr><td>Status: </td> <td><?php echo $status;?></td></tr>
	</tbody>
</table>
<form role="form">
<a class="btn btn-info mt-1" href="print_report.php?pdf=<?php echo $id;?>&bookid=<?php echo $bookid;?>&id=<?php echo $id;?>">Download</a>
	<a class= "btn btn-primary float-center mt-1" href="bookinglist.php"> Back </a>   
</form>
</div> <!-- tab-pane.// -->

</div> <!-- tab-pane.// -->
</div> <!-- tab-content .// -->

</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

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
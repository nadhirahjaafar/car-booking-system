<?php

session_start();
require_once 'database.php';
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
    $userid = $_SESSION ['id'];

 
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

    <title>USERLIST</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <!-- End of Topbar -->
                        
                        
                            
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                     
                     <h1 class="h3" mb-2="" text-gray-800=""></h1><div class="card shadow mb-4">
                                             <div class="card-header py-3">
                                                 <h6 class="m-0 font-weight-bold text-primary">USERID: <?=$_SESSION['id']?></h6>
                                             </div>
                                             
                     
                         
                                             <?php
                     
                     
                     
                     
                     
                         
                     
                     if($_SESSION['role']=='admin'){
                         $sql = "SELECT `id`, `name`, `ic no`, `phone no`, `license`, `role` FROM users ";
                     }
                     
                     
                     
                     
                     $result= $conn -> query ($sql);
                     
                     if ($result->num_rows > 0) {
                     // output data of each row
                     
                     echo "<div class='card shadow mb-4'>
                     <div class='card-header py-3'>
                         <div class='card-body'>
                             <div class='table-responsive'>
                                 <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                     
                     
                                 <thead>
                                 <tr>
                                 <th>USER ID</th>
                                 <th>USER FULLNAME</th>
                                 <th>USER IC NO</th>
                                 <th>USER PHONE NO</th>
                                 <th>USER ROLE</th>
                                
                                 <th></th>
                                 
                                 
                                 </tr>
                                 </thead><tbody>";  
                     
                                 while($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $icno = $row['ic no'];
                                    $telno = $row['phone no'];
                                    $role = $row['role'];
                                    
                                    
                                    echo "<tr>
                                    <td> $id </td>
                                    <td> $name </td>
                                    <td> $icno </td>
                                    <td> $telno </td>
                                    <td> $role </td>
                                    

                                    <td>
                                    <a class='btn btn-info' href='userdetails.php?id=$id'>Details</a>
                                    <a class='btn btn-danger btn-circle' onClick=\"javascript: return confirm('Are you sure want to delete this visitor?');\" href='admindelete.php?id=$id'> 
                <i class='fas fa-trash'></i> </a></td>
        </tr>";

                                   
            
                                }
                                echo "</tbody></table>
                                </div>
                                </div>
                                </div>";
                                
                                } else {
                                echo "0 result";
                                }
                                $conn->close();
                                
                                ?>
                                
                <!-- /.container-fluid -->

            </div>
               
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <p>Copyright SpeedyLux &copy;<script>document.write(new Date().getFullYear());</script>  All rights reserved </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
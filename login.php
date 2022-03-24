<?php 
session_start();
$_SESSION['login']= false;

require_once('database.php');
require_once('index.php');

$str = password_hash('', PASSWORD_DEFAULT);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demo.css">
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
    
    
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h2><b>Login</b></h2>
        </div>
        <div class="d-flex flex-column text-center">
        <form class="user"  method="post">
            <div class="form-group">
              <input type="username" class="form-control"  id="username" required="" name="username" placeholder="Enter Your Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" required="" name="password" placeholder="Enter Your Password">
            </div>
            <label for="remember-me" class="text-info" style= "color: white" ><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label>
            <br>
            <input class="btn btn-primary btn-user btn-block" type='submit' name='submit' value='Login'>
        
            </form>
          <div class="text-center text-muted delimiter"></div>
          

          <?php

if(isset ($_POST['submit'])){
    $password =$_POST ['password'];
    $username= $_POST ['username'];

    $sql= "SELECT*FROM users WHERE username= '$username'";
    $result = $conn -> query ($sql);

    if ($result -> num_rows > 0) { 

        // output data of each row 
        while ($row = $result -> fetch_assoc()) {
            $passwordhash = $row ['password'];
            $id =$row ['id'];
            $username =$row ['username'];
            $role= $row ['role'];
        
           
        if (password_verify ($password, $passwordhash)) {
            $_SESSION ['login']= true;
            $_SESSION ['id'] = $id;
            $_SESSION['username'] = $username; 
            $_SESSION ['role']= $role;

            if($_SESSION['role']=='User'){
                $sql = "SELECT id FROM users" ;
                echo '<script type="text/javascript">alert("User Successful Login!");window.location=\'user.php\';</script>';
                exit;
            }

            if($_SESSION['role']=='admin'){
                $sql = "SELECT id FROM users" ;
                echo '<script type="text/javascript">alert("Admin Successful Login!");window.location=\'admin.php\';</script>';
                exit;
            }

        } else{
                          
            echo '<script type="text/javascript">alert("Wrong Username or Password");window.location=\'login.php\';</script>';
           
        }
    }
} else{
 
    echo '<script type="text/javascript">alert("Wrong Username or Password");window.location=\'login.php\';</script>';
}
} 


$conn->close();



?>
        
           
            
    
          <br>
        <div class="signup-section">Not a member yet? <a href="register.php" class="text-info"> Sign Up</a>.</div>
      </div>
  </div>
</div>
<!-- partial -->

  
  </article>
 </main>
 
  <footer></footer>
  
  
  <!-- jQuery -->
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <!-- Popper JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
  <!-- Bootstrap JS -->
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
   <!-- Custom Script -->      
  <script  src="js/script.js"></script>
  
  </body>
</html>
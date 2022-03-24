<?php 
require_once('database.php');
require_once('index.php');

if(isset($_POST['submit'])) {

  $name = strtoupper($_POST ['name']);
  $icno =$_POST ['icno'];
  $telno =$_POST ['telno'];
  $driver = strtoupper($_POST ['driver']);
  $driveric =$_POST ['driveric'];
  $drivertel =$_POST ['drivertel'];
  $license =$_POST ['license'];
  $start = $_POST ['start'];
  $end = $_POST ['end'];
  $role = $_POST ['role'];
  $username =$_POST ['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
  
  
  $sql= "INSERT INTO users (`name`, `ic no`, `phone no`, `driver name`, `driver ic no`, `driver phone no`,  `license`, `license start period`, `license end period`, `role`, `username`, `password` )
  VALUES ('$name',  '$icno', '$telno', '$driver', '$driveric', '$drivertel', '$license', '$start',  '$end',  '$role', '$username', '$password')";
if ($conn -> query ($sql)=== TRUE) {
  echo '<script type="text/javascript">alert("Registration Successful!");window.location=\'login.php\';</script>';
} else {
   echo "Error: ". $sql. "<br>". $conn-> error;
}

}
$conn -> close();




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
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
          <h2><b>Sign Up</b></h2>
        </div>
        <div class="d-flex flex-column text-center">
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
              <input type="text" class="form-control" id="name"  name="name" required="" placeholder="Enter Your Fullname">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="icno" name="icno" required="" placeholder="Enter Your IC Number">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="telno"  name="telno" required="" placeholder="Enter Your Phone Number">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="driver"  name="driver" required="" placeholder="Enter Your Driver Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="driveric" name="driveric" required="" placeholder="Enter Your Driver IC Number">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="drivertel"  name="drivertel" required="" placeholder="Enter Your Driver Phone Number">
            </div>
            <div class="form-group">
              <select class="form-control" id="license" name="license" required="">
             
        <option value= "" selected ="selected"> Choose Car License</option>
<option value = "D"> D</option>
<option value = "DA"> DA</option>
</select>
<br>
<label>License Start Period</label>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <label>License End Period</label> 
<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                 <input type="date" class="form-control form-control-user" id="start"
                              name="start">
                              </div>

                              <div class="col-sm-6">
                              <input type="date" class="form-control form-control-user" id="end"
                                            name="end">
                              </div>
                              </div>

            <div class="form-group"  >
              <select class="form-control"  id="role" name="role" required="" >
             
        <option value= "" selected ="selected"> Choose Your Role</option>
<option value = "User">User</option>
</select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="username" required="" placeholder="Enter Your Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="" placeholder="Enter Your Password">
              
            </div>

           
<script>

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
            
    <label>  <input type="checkbox" value="" id=""> &nbsp; I accept the <a href="#">terms and conditions</a>.
                                </label>
            <br>
           
            <input class="btn btn-primary btn-user btn-block" type='submit' name='submit' value='Register Account'>
        
          
          <div class="text-center text-muted delimiter"></div>
        
          <br>
        <div class="signup-section">Have registered? <a href="login.php" class="text-info">Login</a>.</div>
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
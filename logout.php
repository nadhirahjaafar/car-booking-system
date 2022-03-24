<?php
session_start();
session_destroy();
echo "<script>alert('You are successfully logout!');</script>";
echo "<script>location='login.php';</script>";
?>

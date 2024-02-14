<?php 
session_start();

  include("connection.php");
  include("functions.php");
$fct = $_SESSION['fct'];
$user_data = check_login($con,$fct);
header("Location: ../Pages/accueil.html");
?>
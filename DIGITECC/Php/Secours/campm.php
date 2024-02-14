<?php 
session_start();

include("../connection.php");
include("../functions.php");

$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
if ($user_daa['fct'] == "Campus") {
    header("Location:campm_resp.php");

}
else if ($user_daa['fct'] == "Bureaux" && $user_daa['type']=="BDE")  {
    header("Location:campm_resp.php");

}
else{
    header("Location:campm_aut.php");

}

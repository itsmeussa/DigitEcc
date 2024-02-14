<?php 
session_start();

include("../connection.php");
include("../functions.php");

$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
if ($user_daa['fct'] == "Newrest" or $user_daa['fct']=="bureaux" or $user_daa['fct']=="association" ) {
    header("Location:reclamation_resp.php");

}
else{
    header("Location:reclamation_aut.php");

}

<?php 
session_start();

include("../connection.php");
include("../functions.php");

$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
if ($user_daa['fct'] == "Bureaux" and $user_daa['type']=='BDE') {
    header("Location:sécurité_resp.php");

}
else{
    header("Location:sécurité_aut.php");

}

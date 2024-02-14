<?php 
session_start();

include("../connection.php");
include("../functions.php");

$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
if ($user_daa['fct'] == "infer") {
    header("Location:infermerie_resp.php");

}
else if ($user_daa['fct'] == "Bureaux" && $user_daa['type']=="BDE")  {
    header("Location:infermerie_resp.php");

}
else{
    header("Location:infermerie_aut.php");

}

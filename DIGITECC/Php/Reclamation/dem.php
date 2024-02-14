<?php 
session_start();

include("../connection.php");
include("../functions.php");

$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
if ($user_daa['fct'] == "Association") {
    header("Location:dem_resp.php");

}
else if ($user_daa['fct'] == "Bureaux")  {
    header("Location:dem_resp.php");

}
else{
    header("Location:dem_aut.php");

}

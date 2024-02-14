<?php 
session_start();

include("../connection.php");
include("../functions.php");

$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
if ($user_daa['fct'] == "Newrest") {
    header("Location:newrest_resp.php");

}
else{
    header("Location:newrest_aut.php");

}

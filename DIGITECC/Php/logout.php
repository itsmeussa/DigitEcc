<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
	unset($_SESSION['fct']);

}

header("Location: ../Pages/login.html");
die;
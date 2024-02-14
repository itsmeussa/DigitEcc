<?php

function check_login($con,$fct)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$fct = $_SESSION['fct'];
		$query = "select * from ";
		$query .= $fct;
		$query .= " where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.html");
	die;

	
}
function check_login2($con,$fct)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$fct = $_SESSION['fct'];
		$query = "select * from ";
		$query .= $fct;
		$query .= " where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: ../login.html");
	die;

	
}
// function check_res_salle($con){
// 	if(isset($_SESSION['user_id']))
// 	{
// 		$email=$_SESSION['email']
// 		$query="select * from reservation where email='$email'"
// 	}
// }

function check_login1($con)
{

	if(isset($_SESSION['user_id']))
	{
		

		return $_SESSION['Email'];
	}
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $email = $_POST['Email'];
		$password = $_POST['Password'];
        $fonction = $_POST['Fonction'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{
			$query = "select * from ";
			$query .= $fonction;
			$query .= " where email = '$email' limit 1";
			//read afrom database
			
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						
						$_SESSION['fct'] = $user_data['fct'];
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: accueil.php");
						die;
					}
				}
			}
			
			$message='Wrong username or password!';
 
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
		}else
		{
			$message='Wrong username or password!';
 
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

		}
	}

?>
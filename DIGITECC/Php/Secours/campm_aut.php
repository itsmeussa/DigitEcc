<?php
session_start();

include("../connection.php");
include("../functions.php");
$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $objet = $_POST["objet"];
        $message = $_POST["message"];
        $query = "insert into campusmanager_boite (email,objet,message) values ('$user_daa[email]','$objet','$message')";
        mysqli_query($con, $query);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECC COMMUNITY</title>
</head>
<body>
<link rel="stylesheet" href="../../Styles/Secours/campm.css">

    <div class="navigation">
  
        <a class="haha" href="../login.html">
          <img src="../../Images/logo.png" class="anyy">
      
      <div class="logout">LOGOUT</div>
    
        </a>
    </div>
	<form method="post">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
            <div class="login">
                <br>
                <img class="logocent" src="../../Images/campus_manager.png" >
                <br>
        <h1>Campus manager</h1>
        <a><img src="../../Images/email.png" style="width: 20px; margin: 5px;padding: 5px;"><br>Campus@centrale-casablanca.ma</a><br><br>
		<input name="objet" type="text" class="lab" placeholder="Objet">
        <textarea name="message" rows="4" cols="50" class="lab" placeholder="Your message..." ></textarea><BR>
        <br>
        <input type ="button" id="btn" style="background-color: gray;" value="Annuler" onclick="window.location.href='../accueil.php';">
        <input type ="submit" name="submit" id="btn" value="Submit">
		<br><br>
	</form>
	</center>
            </div>
        </body>
        </html>
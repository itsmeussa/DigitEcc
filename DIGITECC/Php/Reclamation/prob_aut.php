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
        $fonction = $_POST['bureau'];
        $query = "insert into probleme (nom,prenom,email,objet,message,fonction) values ('$user_daa[nom]','$user_daa[prenom]','$user_daa[email]','$objet','$message','$fonction')";
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
    <link rel="stylesheet" href="../../Styles/Reclamation/prob.css">

</head>
<body>

    <div class="navigation">
  
        <a class="haha" href="../logout.php">
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
                <img class="logocent" src="../../Images/probleme.png" >
                <br>
        <h1>Probléme</h1>
        <select name="bureau" id="chh" class="lab" >
            <option value="" disabled selected>Destinataire</option>
            <option value="BDE">Bureau d'étudiant</option>
            <option value="BDS">Bureau de sports</option>
            <option value="BDA">Bureau des arts</option>
            <option value="ECC Entreprise">ECC Entreprise</option>
            <option value="Centrale Tech">Centrale Tech</option>
            <option value="JECC">JECC</option>
            <option value="Centrale Aero">Centrale Aero</option>
            <option value="Centrale Finance Society">Centrale Finance Society</option>
            <option value="Centrale Mun">Centrale Mun</option>
            <option value="Enactus">Enactus</option>
            <option value="Rotaract">Rotaract</option>
            </select><br>
		<input name="objet" type="text" class="lab" placeholder="Objet">
        <textarea name="message" rows="4" cols="50" class="lab" placeholder="Your message..." ></textarea><BR>
        <br>
        <input type ="button" id="btn" style="background-color: gray;" value="Annuler" onclick="window.location.href='../Accueil.php';">
        <input type ="submit" name="submit" id="btn" value="Submit">
		<br><br>
	</form>
	</center>
            </div>
        </body>
        </html>
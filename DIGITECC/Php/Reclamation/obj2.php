<?php
session_start();

include("../connection.php");
include("../functions.php");
$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $message =strval( $_POST["message"]);
        $query = "INSERT INTO objet_perdu (nom, prenom, Message, email, num) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $user_daa['nom'], $user_daa['prenom'], $message, $user_daa['email'], $user_daa['num']);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Check for successful insertion
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Votre message est envoyé!";
        } else {
            echo "Veuillez ressayer";
        }
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
    <link rel="stylesheet" href="../../Styles/Reclamation/obj2.css">

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
                <img class="logocent" src="../../Images/securite.png" >
                <br>
        <h1>Objet perdu</h1>
        <textarea name="message" rows="4" cols="50" class="lab" placeholder="Your message..." ></textarea><BR>
        <br>
        <input type ="button" id="btn" style="background-color: gray;" value="Annuler" onclick="window.location.href='../accueil.php';">
        <input type ="submit" name="submit" id="btn" value="Submit">
		<br><br>
	</form>
    </div>
    </center>
        </body>
        <script type="text/javascript" src="../../Script/Reclamation/obj2.js"></script>

        </html>
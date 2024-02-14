<div class="navigation">
  
<a class="button" href="../logout.php">
  <img src="../../Images/logo.png">

<div class="logout">LOGOUT</div>

</a>
</div><br><br><br><br>
<?php 
session_start();

include("../connection.php");
include("../functions.php");
$fct = $_SESSION['fct'];
$user_daa = check_login2($con,$fct);
echo('

<br><br><br><br>
<center>

<input class="boxa" id="searchbar" onkeyup="search_objet()" type="text"
        name="search" placeholder="Search objects..">
        <ol id="list">
        
');


$sub = "select * from demande where fonction='$user_daa[type]'  order by date desc";
$result = mysqli_query($con,$sub);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<li class='objets' style='color:black;'> <div style='font-style:italic;color:green;'>$row[objet] :</div>  $row[message] <br>Mon email est $row[email] <br> Publie le $row[date]</li>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECC COMMUNITY</title>
    <link rel="stylesheet" href="../../Styles/Reclamation/obj.css">

</head>
<body>


<input type ="button" id="btn" style="background-color: gray;" value="Annuler" onclick="window.location.href='../Accueil.php';">
<script type="text/javascript" src="../../Script/Reclamation/obj.js"></script>

</body>
</html>
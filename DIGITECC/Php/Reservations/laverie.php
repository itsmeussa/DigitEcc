<?php 
session_start();

    include("../connection.php");
    include("../functions.php");
    $fct = $_SESSION['fct'];
    $user_daa = check_login($con,$fct);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $machine = $_POST['Fonction'];
    if (isset($_POST['check'])  ) {

        $sub = "select * from reservation_laverie";
        $result = mysqli_query($con,$sub);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($machine == $row['machine']) {
            $daatt = $row['date_res'];
            echo ("<style>[id^='$daatt']{background-color: red;}}</style>");
        }
    }
    $sub = "select * from reservation_laverie where email='$user_daa[email]'";
    $result = mysqli_query($con,$sub);
while ($row = mysqli_fetch_assoc($result)) {
    if ($machine == $row['machine']) {
        $daatt = $row['date_res'];
        echo ("<style>[id^='$daatt']{background-color: blue;}}</style>");
    }
            
    }
}
else if (isset($_POST['submit']) && !empty($_POST['button'])) {
    $datte = $_POST['button'];

    // Something posted
        
    // for ($x=0;$x<=count($the);$x++)
    // {   
    // if (isset($_POST[$the[$x]])) {

    $quee = "select count(*) as total from reservation_laverie where email='$user_daa[email]' ;";
    $result = mysqli_query($con, $quee);
    $number = mysqli_fetch_assoc($result);
    $queee = "select count(*) as em from reservation_laverie where date_res='$datte' and machine='$machine';";
    $resulta = mysqli_query($con, $queee);
    $nuu = mysqli_fetch_assoc($resulta);
    if ($nuu['em'] == 0) {

        if ($number['total'] >= 2) {
            echo "<center><br><label style='color:blue;' class='Fonction'>Vous avez atteint le nombre maximal de réservations";
        } else {
            // $date = $the[$x];
            $query = "insert into reservation_laverie (email,nom,prenom,num,date_res,machine) values ('$user_daa[email]','$user_daa[nom]','$user_daa[prenom]','$user_daa[num]','$datte','$machine');";
            mysqli_query($con, $query);
            $the = array("811L", "811MA", "811ME", "811J", "811V", "811S", "811D", "1114L", "1114MA", "1114ME", "1114J", "1114V", "1114S", "1114D", "1417L", "1417MA", "1417ME", "1417J", "1417V", "1417S", "1417D", "1720L", "1720MA", "1720ME", "1720J", "1720V", "1720S", "1720D", "2023L", "2023MA", "2023ME", "2023J", "2023V", "2023S", "2023D", "2302L", "2302MA", "2302ME", "2302J", "2302V", "2302S", "2302D");
            $tran = array(
                "Lundi 08:00-11:00",
                "Mardi 08:00-11:00",
                "Mercredi 08:00-11:00",
                "Jeudi 08:00-11:00",
                "Vendredi 08:00-11:00",
                "Samedi 08:00-11:00",
                "Dimanche 08:00-11:00",
                "Lundi 11:00-14:00",
                "Mardi 11:00-14:00",
                "Mercredi 11:00-14:00",
                "Jeudi 11:00-14:00",
                "Vendredi 11:00-14:00",
                "Samedi 11:00-14:00",
                "Dimanche 11:00-14:00",
                "Lundi 14:00-17:00",
                "Mardi 14:00-17:00",
                "Mercredi 14:00-17:00",
                "Jeudi 14:00-17:00",
                "Vendredi 14:00-17:00",
                "Samedi 14:00-17:00",
                "Dimanche 14:00-17:00",
                "Lundi 17:00-20:00",
                "Mardi 17:00-20:00",
                "Mercredi 17:00-20:00",
                "Jeudi 17:00-20:00",
                "Vendredi 17:00-20:00",
                "Samedi 17:00-20:00",
                "Dimanche 17:00-20:00",
                "Lundi 20:00-23:00",
                "Mardi 20:00-23:00",
                "Mercredi 20:00-23:00",
                "Jeudi 20:00-23:00",
                "Vendredi 20:00-23:00",
                "Samedi 20:00-23:00",
                "Dimanche 20:00-23:00",
                "Lundi 23:00-02:00",
                "Mardi 23:00-02:00",
                "Mercredi 23:00-02:00",
                "Jeudi 23:00-02:00",
                "Vendredi 23:00-02:00",
                "Samedi 23:00-02:00",
                "Dimanche 23:00-02:00"
            );
            for ($x = 0; $x <= count($the); $x++) {
                $a = "$the[$x]";
                error_reporting(E_ERROR | E_PARSE);
                if ( $a == $datte) {
                    echo "<center><br><label style='color:blue;'>Vous avez réservé la machine numéro $machine pour la date $tran[$x]";
                }
            }
        }
            
    } else {
        $qqq = "select * from reservation_laverie where date_res='$datte' and machine='$machine' limit 1 ;";
        $resultaa = mysqli_query($con, $qqq);
        $nuua = mysqli_fetch_assoc($resultaa);
        $word= "Ce créneau est déja réservé par : ";
        $word.=$nuua['nom'];
        $word.=" ";
        $word.= $nuua['prenom'];
        $word.=" son numéro de téléphone ";
        $word.=$nuua['num'];
        echo "<center><br><label style='color:blue;'>$word</label></center>";
    }
    }
else if (isset($_POST['cancel']) && !empty($_POST['button'])){
    $datte = $_POST['button'];
    $qeey = "select * from reservation_laverie where date_res='$datte' and machine='$machine';";
    $res=mysqli_query($con,$qeey);
    $datta=mysqli_fetch_assoc($res);
    if (!empty($datta)){
    if ($datta['email']==$user_daa['email'])
    {
        $cmd="delete from reservation_laverie where date_res = '$datte' and machine = '$machine';";
        mysqli_query($con,$cmd);
        echo "<center><br><label style='color:blue;'>Vous avez annuler votre résérvation</label>";
    } 
    else if ( $user_daa['fct']=="Bureaux" or  $user_daa['fct']=="Personnel" or $user_daa['fct']=="Association") {
        $cmd="delete from reservation_laverie where date_res = '$datte' and machine = '$machine';";
        mysqli_query($con, $cmd);
        echo "<center><br><label style='color:black;'>Vous avez annuler cette résérvation</label>";
    }
    else {
        echo "<center><br><label style='color:blue;'>You don't have the permission to cancel this reservation</label>";
    }
    }
    else{
            echo "<center><br><label style='color:blue;'>Cette salle est déja disponible</label>";
    }
    }
else if (isset($_POST['show'])){
    echo "<script>document.getElementById('aa').style.display='none'</script>";
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
    <link rel="stylesheet" href="../../Styles/Reservations/laverie.css">

</head>
<body>
    <div class="navigation">
        <a class="button" href="../logout.php">
          <img src="../../Images/logo.png">
      <div class="logout">LOGOUT</div>
        </a>
    </div>
        <br>
        <br>
        <center>
        <div style="color:black;">Choissir la machine qui vous intéresse :</div>

        <form method="post">
        <select id="Fonction" class="Fonction" name="Fonction">
            <option value="MACHINE 1">machine 1</option>
            <option value="MACHINE 2">machine 2</option>
            <option value="MACHINE 3">machine 3</option>
            <option value="MACHINE 4">machine 4</option>
            
            </select><br><br>
            <div style="color:black;">Choissir le créneau qui vous intéresse et cocher sur Reserver  :</div><br>
        <div style="color:red;">Veuillez clicker sur button "Check" avant de reserver pour vérifier la disponibilité</div><br>
            <table border="1" width="80%">
  
    
                <colgroup>
              
              <col style="width:80px">
              
              <col>
              
              <col>
              
              </colgroup>
            <tr><th>Période</th>
                <th id="tet" class="01">  Lundi  </th> 
                <th id="tet" class="02">  Mardi  </th> 
                <th id="tet" class="03"> Mercredi </th> 
                <th id="tet" class="04">   Jeudi  </th> 
                <th id="tet" class="05"> Vendredi </th> 
                <th id="tet" class="06">  Samedi  </th> 
                <th id="tet" class="07"> Dimanche </th>
                
            </tr>
            <form>
            <tr><th id="tet">08:00-11:00</th>
            <th id="811L"><input id="811L" type="radio" class="btn Monday" name="button" value="811L" ></th>
            <th id="811MA"><input id="811MA" type="radio" class="btn Tuesday" name="button" value="811MA" ></th>
            <th id="811ME"><input id="811ME" type="radio" class="btn Wednesday" name="button" value="811ME" ></th>
            <th id="811J"><input id="811J" type="radio" class="btn Thursday" name="button" value="811J" ></th>
            <th id="811V"><input id="811V" type="radio"  class="btn Friday" name="button" value="811V" ></th>
            <th id="811S"><input id="811S" type="radio"  class="btn Saturday" name="button" value="811S" ></th>
            <th id="811D"><input id="811D" type="radio"  class="btn Sunday" name="button" value="811D" ></th>
            </tr>
            <tr><th id="tet">11:00-14:00</th>
            <th id="1114L"><input  type="radio"  class="btn Monday" name="button" id="1114L" value="1114L" ></th>
            <th id="1114MA"><input  type="radio"  class="btn Tuesday" name="button" id="1114MA" value="1114MA" ></th>
            <th id="1114ME"><input  type="radio"  class="btn Wednesday" name="button" id="1114ME" value="1114ME" ></th>
            <th id="1114J"><input  type="radio"  class="btn Thursday" name="button" id="1114J" value="1114J" ></th>
            <th id="1114V"><input  type="radio"  class="btn Friday" name="button" id="1114V" value="1114V" ></th>
            <th id="1114S"><input  type="radio"  class="btn Saturday" name="button"  id="1114S" value="1114S" ></th>
            <th id="1114D"><input  type="radio"  class="btn Sunday" name="button" id="1114D" value="1114D" ></th>
            </tr>
            <tr><th id="tet">14:00-17:00</th>
            <th id="1417L"><input  type="radio"  class="btn Monday" name="button" id="1417L" value="1417L" ></th>
            <th id="1417MA"><input  type="radio"  class="btn Tuesday" name="button" id="1417MA" value="1417MA" ></th>
            <th id="1417ME"><input  type="radio"  class="btn Wednesday" name="button" id="1417ME" value="1417ME" ></th>
            <th id="1417J"><input  type="radio"  class="btn Thursday" name="button" id="1417J" value="1417J" ></th>
            <th id="1417V"><input  type="radio"  class="btn Friday" name="button" id="1417V" value="1417V" ></th>
            <th id="1417S"><input  type="radio"  class="btn Saturday" name="button" id="1417S" value="1417S" ></th>
            <th id="1417D"><input  type="radio"  class="btn Sunday" name="button" id="1417D" value="1417D" ></th> 
            </tr>
            <tr><th id="tet">17:00-20:00</th>
            <th id="1720L"><input  type="radio"  class="btn Monday" name="button" id="1720L" value="1720L" ></th>
            <th id="1720MA"><input  type="radio"  class="btn Tuesday" name="button" id="1720MA" value="1720MA" ></th>
            <th id="1720ME"><input  type="radio"  class="btn Wednesday" name="button" id="1720ME" value="1720ME" ></th>
            <th id="1720J"><input  type="radio"  class="btn Thursday" name="button" id="1720J" value="1720J" ></th>
            <th id="1720V"><input  type="radio"  class="btn Friday" name="button" id="1720V" value="1720V" ></th>
            <th id="1720S"><input  type="radio"  class="btn Saturday" name="button" id="1720S" value="1720S" ></th>
            <th id="1720D"><input  type="radio"  class="btn Sunday" name="button" id="1720D" value="1720D" ></th> 
            </tr>
            <tr><th id="tet">20:00-23:00</th>
            <th id="2023L"><input  type="radio"  class="btn Monday" name="button" id="2023L" value="2023L" ></th>
            <th id="2023MA"><input  type="radio"  class="btn Tuesday" name="button" id="2023MA" value="2023MA" ></th>
            <th id="2023ME"><input  type="radio"  class="btn Wednesday" name="button" id="2023ME" value="2023ME" ></th>
            <th id="2023J"><input  type="radio"  class="btn Thursday" name="button" id="2023J" value="2023J" ></th>
            <th id="2023V"><input  type="radio"  class="btn Friday" name="button" id="2023V" value="2023V" ></th>
            <th id="2023S"><input  type="radio"  class="btn Saturday" name="button" id="2023S" value="2023S" ></th>
            <th id="2023D"><input  type="radio"  class="btn Sunday" name="button" id="2023D" value="2023D" ></th> 
            </tr>
            <tr><th id="tet">23:00-02:00</th>
            <th id="2302L"><input  type="radio"  class="btn Monday" name="button" id="2302L" value="2302L" ></th>
            <th id="2302MA"><input  type="radio"  class="btn Tuesday" name="button" id="2302MA" value="2302MA" ></th>
            <th id="2302ME"><input  type="radio"  class="btn Wednesday" name="button" id="2302ME" value="2302ME" ></th>
            <th id="2302J"><input  type="radio"  class="btn Thursday" name="button" id="2302J" value="2302J" ></th>
            <th id="2302V"><input  type="radio"  class="btn Friday" name="button" id="2302V" value="2302V" ></th>
            <th id="2302S"><input  type="radio"  class="btn Saturday" name="button" id="2302S" value="2302S" ></th>
            <th id="2302D"><input  type="radio"  class="btn Sunday" name="button" id="2302D" value="2302D"  ></th>
            </tr>
    </form>
              </table>
            <br>
            <br>
            <input name="submit" type="submit" class="ahh" value="Reserver">
            <input name="cancel" type="submit" class="ahh" value="Annuler"><br>
            <input name="check" type="submit" class="ahh" value="Check"><br>
            <input name="back" type="button" class="ahh" value="Back" onclick="window.location.href='../Accueil.php'">
        </form>
        </center>
        <script type="text/javascript" src="../../Script/Reservations/laverie.js"></script>


</body>

</html>
<?php 
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $today=date("l");
        echo ("<script>
        const days=document.getElementsByClassName('$today');
        for (let i = 0; i < days.length; i++) {
            days[i].disabled=true;
        }
        </script>");
        $semaines=['L','MA','ME','J','V','S','D'];
        for ($i = 0; $i < count($semaines); $i++) {
            echo "Ok";
            if ($today==$daysOfWeek[$i]){
                echo "Done";
                $e=($i-1)%7;
                $queryy="delete from reservation_laverie where date_res like '%$semaines[$e]';";
                mysqli_query($con, $queryy);
            }
            }
        ?>
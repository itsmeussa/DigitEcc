<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Email/src/Exception.php';
require '../Email/src/PHPMailer.php';
require '../Email/src/SMTP.php';

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $num = $_POST['num'];
    $fonction = $_POST['fonction'];
    function generateRandomPassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = str_shuffle($characters);
        $password = substr($randomString, 0, 8);
        return $password;
    }
    
    
    
    
    if(!empty($email)  && !is_numeric($email) && substr($email, -23) === "@centrale-casablanca.ma")
    {
        $password = generateRandomPassword();

        $user_id = random_num(20);
        if($fonction=="Etudiant"){
                    $identifiant = $_POST['identifiant'];
                    $query = "insert into Etudiant (user_id,nom,prenom,identifiant,email,password,fct,num) values ('$user_id','$nom','$prenom','$identifiant','$email','$password','Etudiant','$num')";
                }
                elseif(strval($fonction)=="Association"){
                    $assos = $_POST['assos'];
                    $query = "insert into Association (user_id,nom,prenom,email,password,type,fct,num) values ('$user_id','$nom','$prenom $assos','$email','$password','$assos','Association','$num')";
                }
                elseif(strval($fonction)=="Personnel"){
                    $fct_pers = $_POST['pers_ass'];
                    $query = "insert into Personnel (user_id,nom,prenom,email,password,fonction,fct,num) values ('$user_id','$nom','$prenom personnel','$email','$password','$fct_pers','Personnel','$num')";
                }
                elseif(strval($fonction)=="Navette"){
                    $query = "insert into Navette (user_id,nom,prenom,email,password,fct,num) values ('$user_id','$nom','$prenom','$email','$password','Navette','$num')";
                }
                elseif(strval($fonction)=="Newrest"){
                    $query = "insert into Newrest (user_id,nom,prenom,email,password,fct,num) values ('$user_id','$nom','$prenom','$email','$password','Newrest','$num')";
                }
                elseif(strval($fonction)=="Bureaux"){
                    $bdx = $_POST['bureau'];
                    $bdx_fct = $_POST['bdx_fct'];
                    
                    $query = "insert into Bureaux (user_id,nom,prenom,email,password,fonction,type,fct,num) values ('$user_id','$nom','$prenom $bdx','$email','$password','$bdx_fct','$bdx','Bureaux','$num')";
                }
                elseif(strval($fonction)=="Campus Manager"){
                    $query = "insert into Campus (user_id,nom,prenom,email,password,fct,num) values ('$user_id','$nom','$prenom','$email','$password','Campus','$num')";
                }
                elseif(strval($fonction)=="Infermiére"){
                    $query = "insert into Infer (user_id,nom,prenom,email,password,fct,num) values ('$user_id','$nom','$prenom','$email','$password','Infer','$num')";
                    }
                mysqli_query($con, $query);
                $access_code=$password;
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->CharSet = "utf-8";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->isHTML(true);

                $mail->Username = 'whatsappcompanyads@gmail.com';
                $mail->Password = 'pqzjpszunnwgtgyl';
                $mail->setFrom($email, 'ECC COMMUNITY');
                $mail->Subject = "Code d'accés";
                $mail->MsgHTML("Votre code d'accés est <div style='color:red;'>".$password.'</div>');
                $mail->addAddress($email, $nom.' '.$prenom);


                $mail->send();
                
                echo '<script>
                alert("Félicitations, Vous devez recevoir votre password via email (merci de vérifier SPAM)");</script>';

                header("Location: ../Pages/login.html");
                    die;
                }
        else
		{
            echo '<script>
                alert("Les information sont incorrecte!");</script>';
		}
}
?>
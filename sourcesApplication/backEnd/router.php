<?php
/*
require_once "/xampp/htdocs/zooArcadia/backEnd/lib/session.php";
require_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php";
require_once "/xampp/htdocs/zooArcadia/backEnd/lib/user.php";
*/

require_once dirname(__FILE__)."/lib/session.php"; 
require_once dirname(__FILE__)."/lib/pdo.php";
require_once dirname(__FILE__)."/lib/user.php";

 $errors = [];



if($_POST['user-connect']){
$user = connexionUtilisateur($pdo,$_POST['password'],$_POST['user-email']);

if($user){
    $_SESSION['user'] = $user;
    header('location:/backEnd/dashboard.php');
}
else{
    header('location:/frontEnd/connexion.php?var=1');
    $_POST['user-connect'] = false;
    $errors = " identifiant ou mot de passe erroné";

    
}
}




?>




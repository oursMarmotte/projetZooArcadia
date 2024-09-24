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
/* securité  a implementer
 if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){

die("ERREURCSRF");
var_dump($_SESSION['csrf_token']);
 }else{
    echo "Jeton CSRF definie";
    
 }

 */


/*fonction de filtrage entré user*/
function filter_form($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_POST['user-connect']){

    $email = filter_form($_POST['user-email']);
    $pwd = filter_form($_POST['password']);
$user = connexionUtilisateur($pdo,$pwd,$email);

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




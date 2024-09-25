<?php
require_once dirname(__FILE__)."/pdo.php";


$chiffre = $_GET['numUser'];
$pdostatement = $pdo->prepare('DELETE FROM employé WHERE employé.employé_id=:id LIMIT 1');
$pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);


$result = $pdostatement->execute();

if($result){

    /**info=1 messsage supprimer */
    
    header('location:http://zooarcadia.local/backEnd/dashboard.php?info=1');
}else{
/**info=2 echec suppression */

    
    header('location:http://zooarcadia.local/backEnd/dashboard.php?$info=2');
}





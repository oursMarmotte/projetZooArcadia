<?php
 require_once dirname(__FILE__)."/pdo.php";



function insertMessage($pdo,$pseudo,$champ){

    $query = $pdo->prepare('INSERT INTO avis (visiteur_pseudo, avis_champ)VALUES(:pseudo,:champ)');

   


    $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
    $query->bindValue(':champ',$champ,PDO::PARAM_STR);


   if($query->execute())
   {

    echo 'requete ok ';
   }else{

    echo 'error';
   }
}




function getMessage($pdo){

$statement = $pdo->prepare('SELECT * FROM avis' );
$statement->execute();
if($statement->execute()){
    $tabAvis= $statement->fetchAll(PDO::FETCH_ASSOC);
    return $tabAvis;
}else{
    echo "errors";
}

}


?>
<?php 
require_once dirname(__FILE__)."/pdo.php";




$pdo;
function getHabitats($pdo){
$statement = $pdo->prepare('SELECT * FROM habitat');
   $statement->execute();
   $tabHabitat = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $tabHabitat;
}


function getAnimalByHabitat($pdo){

$statement = $pdo->prepare('SELECT * FROM habitat JOIN animal ON Id_Habitat=habitat_id');
if($statement->execute()){

   $tabAnimalByHabitat = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $tabAnimalByHabitat;
}else{
   echo"Errors";
}

}


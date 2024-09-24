<?php 

require_once dirname(__FILE__)."/pdo.php";

 



$pdo;
function getRapport($pdo){
$statement = $pdo->prepare('SELECT * FROM rapport_veterinaire JOIN animal ON rapport_veterinaire.id_Animal = animal.id_Animal;');
   $statement->execute();
   $tabRapport = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $tabRapport;
}

$today = date("Y-m-d"); 

function getRapporByDate($pdo){
   $today = date("Y-m-d"); 
   $statement = $pdo->prepare('SELECT * FROM rapport_veterinaire JOIN animal ON rapport_veterinaire.id_Animal = animal.id_Animal 
   WHERE rapport_veterinaire.rapport_Date =:date;');
   $statement->bindValue(':date',($today),PDO::PARAM_STR);
      $statement->execute();
      $tabRapport = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $tabRapport;
   }
   $tabDate = getRapporByDate($pdo);

   
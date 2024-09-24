<?php 
require_once dirname(__FILE__)."/pdo.php";



$pdo;
function getInformations($pdo){
$statement = $pdo->prepare('SELECT * FROM informations_general');
   $statement->execute();
   $tabInformation = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $tabInformation;
}
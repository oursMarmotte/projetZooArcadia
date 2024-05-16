<?php 
require_once dirname(__FILE__)."/pdo.php";

$pdo;
function affichList($pdo){
$statement = $pdo->prepare('SELECT * FROM services');
   $statement->execute();
   $services = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $services;
}

function affichService($pdo){
   $numserv= 1;
   $statement =$pdo->prepare('SELECT * FROM services WHERE service_id=:id' );
   $statement->bindValue(':id',$numserv,PDO::PARAM_INT);
   $statement->execute();

   $tabService = $statement->fetch();
   return $tabService;
}



?>

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

function recordService($pdo){
   $statement = $pdo->prepare('INSERT INTO services VALUES(NULL, :nom, :description, :icon)');
   
   $statement->bindValue(':nom',$_POST['service_nom'],PDO::PARAM_STR);
   $statement->bindValue(':description',$_POST['service_description'],PDO::PARAM_STR);
   $statement->bindValue(':icon',$_POST['icon'],PDO::PARAM_STR);
   
   $result = $statement->execute();
   
   
       if($result){
   
           /**info=1 Service ajouter */
           
         return true;
       }else{
       /**info=2 echec ajout */
       
           return false;
      
       }
   
   
   }


   function updateService($pdo){
      $statement =$pdo->prepare('UPDATE services set service_nom=:nom,service_description=:description,icon=:icon WHERE service_id=:id LIMIT 1');
      
      $statement->bindValue(':id',$_POST['service_id'],PDO::PARAM_INT);
      $statement->bindValue(':nom',$_POST['service_nom'],PDO::PARAM_STR);
      $statement->bindValue(':description',$_POST['service_description'],PDO::PARAM_STR);
      $statement->bindValue(':icon',$_POST['icon'],PDO::PARAM_STR);
      
      $result = $statement->execute();
      
      if($result){
      
          return true;
      }else{
          
          
          return false;}
      
      
      }

?>

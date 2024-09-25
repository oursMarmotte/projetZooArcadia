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

function recordHabitat($pdo){
   $statement = $pdo->prepare('INSERT INTO habitat VALUES(NULL, :nom, :comment, :description)');
   
   $statement->bindValue(':nom',$_POST['habitat_nom'],PDO::PARAM_STR);
   $statement->bindValue(':comment',$_POST['habitat_commentaire'],PDO::PARAM_STR);
   $statement->bindValue(':description',$_POST['habitat_description'],PDO::PARAM_STR);
   
   
   $result = $statement->execute();
   
   
       if($result){
   
           /**info=1 habitat ajouter */
           
           return true;
       }else{
       /**info=2 echec ajout */
       
           
           return false;
       }
   
   
   }

   function deleteHabitat($pdo){
      $chiffre = $_GET['NBhabitat'];
      $pdostatement = $pdo->prepare('DELETE FROM habitat WHERE habitat.habitat_id=:id LIMIT 1');
      $pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);
      
      
      $result = $pdostatement->execute();
      
      if($result){
      
          /**info=1 habitat supprimer */
          
          return true;
      }else{
      /**info=2 echec suppression */
      
          
          return false;
      }
      }
/*fonction demise ajour Habitat */
      function upDateHabitat($pdo){

      }


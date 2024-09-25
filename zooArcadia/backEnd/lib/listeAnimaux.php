<?php 
require_once dirname(__FILE__)."/pdo.php";


$pdo;



function affichAnimaux($pdo){
   $page = $_GET['page'] ?? 0;

$statement = $pdo->prepare("SELECT * FROM animal WHERE Id_Race ='$page'  LIMIT 0 , 5 ");
  


   $statement->execute();
   $listAnimaux = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $listAnimaux;
}

function getpageAnimal($pdo){
$page = $_GET['page'] ?? 1;
$statement = $pdo->prepare('SELECT * FROM animal LIMIT  :start,5');
$statement->bindValue(':start',5 *($page - 1),PDO::PARAM_INT);

if($statement->execute()){
   while($animal = $statement->fetch(PDO::FETCH_ASSOC)){
      $animal['animal_firstName'];
   }

}else{
   $errorInfo = $statement->errorInfo();
    echo 'SQLSTATE : '.$errorInfo[0].'<br>';
    echo 'Erreur du driver : '.$errorInfo[1].'<br>';
    echo 'Message : '.$errorInfo[2];
}
}


function getAnimals($pdo){
   $statement = $pdo->prepare('SELECT * FROM animal');
   $statement->execute();
  $tabanimals = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $tabanimals;



}


function getCategorieAnimal($pdo){
   $statement = $pdo->prepare('SELECT * FROM category_race');
   $statement->execute();
   $tabCategory = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $tabCategory;
}


function deleteAnimal($pdo){
   $chiffre = $_GET['numAnimal'];
   $pdostatement = $pdo->prepare('DELETE FROM animal WHERE animal.Id_Animal=:id LIMIT 1');
   $pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);
   
   
   $result = $pdostatement->execute();
   
   if($result){
   
       /**info=1 animal supprimer */
       
      return true;
   }else{
   /**info=2 echec suppression */
   
       
       return false;
   }
   
   }


   function recordAnimal($pdo){
      $statement = $pdo->prepare('INSERT INTO animal VALUES (NULL,:name,:idhabitat,:idrace,:image)');
 
$statement->bindValue(':name',$_POST['animal_firstName'],PDO::PARAM_STR);
$statement->bindValue(':image',$_POST['image'],PDO::PARAM_STR);
$statement->bindValue(':idhabitat',$_POST['id_Habitat'],PDO::PARAM_INT);
$statement->bindValue(':idrace',$_POST['Id_Race'],PDO::PARAM_INT);
$statement->bindValue(':image',$_POST['image'],PDO::PARAM_STR);
$result = $statement->execute();

  
  
      if($result){
  
          /**info=1  animal enregistrer */
          
         return true;
      }else{
      /**info=2 echec enregistrement*/
      
          
          return false;
      }
  }
/*fonction de modification de l'animal*/
  function updateAnimal(){

  }


?>
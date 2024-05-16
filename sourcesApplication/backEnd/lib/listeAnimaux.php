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

?>
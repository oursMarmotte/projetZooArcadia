<?php
define('BASE_URL', $_SERVER['DOCUMENT_ROOT']);
require_once dirname(__FILE__)."/lib/pdo.php";
require_once dirname(__FILE__)."/lib/class/piloteAnimal.php";
require_once dirname(__FILE__)."/lib/class/managerAnimal.php";
require_once dirname(__FILE__)."/lib/vendor/autoload.php";
require_once dirname(__FILE__)."/lib/mongoConnect.php";
$manager =new ManagerAnimal($pdo);

/** acces mongodb et récupération des données  */


function fetchAnimalDataMGDB(object $mongoConnect){
  $zooDB = $mongoConnect->zooarcadia;
  $zooCollection = $zooDB->animalData;
  
  $listAnimal = $zooCollection->find(
    ['zoo'=>'arcadia'],
  
  );
  foreach($listAnimal as $val){
    echo ' <p class="text-success"> Score de  l \'animal:  '.$val["name"].'  nombre de click: '.$val["click"]. '<br></p>';
  
  }

}

/**-------------------------------GESTION-----DES----ANIMAUX------------------------------------------------ */

 //connexion pdo + accès base de données
 $managerAnimal = new ManagerAnimal($pdo);

 //fonction d'affichage liste des animaux
 function listAnimaux($pdo){
     $affichAnimal = new ManagerAnimal($pdo);
    $tabAnimaux = $affichAnimal->getAllAnimals();
    return $tabAnimaux;
 }
 
 function listeAnimauxByPage(object $pdo,$page){
$manager =new ManagerAnimal($pdo);
$tabBypage =  $manager->getAllAnimalsByPage($page);
return $tabBypage;
 }


/*requete suppression page liste animaux*/
if(isset($_POST['supr-animal'])){
$idAnimal= $_POST['supr-animal'];
 $resultat = deleteAnimal($idAnimal,$manager);
 $piloteAnimal= $manager->getPiloteById($idAnimal);
 if($resultat === true){
  echo 'animal supprimé avec succès';
  
 }else{
  echo "echec";
 }
}

/*fonction de supression de l'animal*/
function deleteAnimal($animalId,ManagerAnimal $manager){
  $resultat = $manager->deletePiloteByNum($animalId);
  return $resultat;
}

/*obtention informations de l'animal avant modification*/

if(isset($_POST['animalName'])){

    $name = htmlspecialchars(trim($_POST['animalName']));
    

    
getAnimalinfo($name,$manager);
    
}


function getAnimalinfo($animalName,$managerAnimal){



 $animal = $managerAnimal->getPilote($animalName);

 
 if($animal !== null){
    
 echo "<label for='animal-name' class='form-label text-light'>Nom de l'animal à Modifier</label>";
 echo"<p class='animal-name text-light' id='animal-name' value=".$animal->getAnimalname().">".$animal->getAnimalname()."</p>";
 
 echo "<label for='name-change' class='form-label text-light'>Nom de l'animal</label>";
 echo "<input class='form-control' type='text' id='name-change' name='name-change'value=".$animal->getAnimalname().">";
 echo "<input class='form-control' type='hidden' id='animal-id' name='animal-id' value=".$animal->getAnimalid().">";

 
echo '<button id="modif-animal"class="btn btn-primary" name="modif-animal value="updateAnimal">modifier</button>';
echo '</form>';

 }else{
    echo "<div class='alert alert-danger' role='alert'>
    l'animal n'existe pas
  </div>";
  
 }
 
}




if(isset($_POST['animal-update'])){
    
    $animalName=  $_POST['animal-name'];
    $animalId = $_POST['animal-id'];

    

$result = updateDataAnimal($pdo,$animalId,$animalName);
 if($result != false){
  echo"Données mise à jour";
 }else{
  echo "echec mise à jour Données";
 }

}


function updateDataAnimal(object $pdo,int $id,string $name){
  $managerAnimal = new ManagerAnimal($pdo);
  $piloteAnimal = $managerAnimal->getPiloteById($id);
  $result = $managerAnimal->updateNomPilote($piloteAnimal,$name);
return $result;
}

/*requete enregistrement d'un animal page Ajout d'un animal*/

if($_SERVER['REQUEST_METHOD']==='POST'){
  
  if(isset($_FILES['file']['name']) ){
  $filename= $_FILES['file']['name'];
  
  echo $filename;

  fileUpload($filename);
  }
}

if(isset($_POST['btn-enr-ani'])){
  
  $fichier = $_POST['form-data'];

  
 $aniname= htmlspecialchars($_POST["ani-name"]);
  $aniIdRace =   htmlspecialchars($_POST ["id-race"]);
   $aniHabitaId= htmlspecialchars($_POST["id-Hab"]);
$filename= htmlspecialchars($_POST["form-data"]);

var_dump($filename);

  $tabAni = array('animal_firstName'=>$aniname,'Id_Habitat'=>$aniHabitaId,'Id_Race'=>$aniIdRace,"image"=>$filename);
  $nouvelAnimal= new PiloteAnimal($tabAni);


recordAnimal($pdo,$nouvelAnimal,$client);


}


function recordAnimal(object $pdo,PiloteAnimal $animal ,object $client){


  $managerAni =new ManagerAnimal($pdo);

  $reponse= $managerAni->addPilote($animal);
  if($reponse !=false){
    echo"animal enregistré";

  
  }else{
    echo"echec enregistrement";
  }
}

function fileUpload($filename){
  
    
    $fileDestination = "../Assets/images/upload/".basename($filename);
    
   if(file_exists($fileDestination)){
    $saveFile = $fileDestination . 'backup' . basename($filename);
    copy($fileDestination,$saveFile);
  
    $rename_file = $fileDestination.'rename'.basename($filename);
  
    rename($fileDestination,$rename_file);
  
    unlink($saveFile);
   }else{
    if(move_uploaded_file($_FILES['file']['tmp_name'],$fileDestination)){
      return $fileDestination;
     }else{
      echo"echec";
     }
   
    }
   
  
  }

  

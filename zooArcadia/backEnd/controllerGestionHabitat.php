<?php
require_once dirname(__FILE__)."/lib/class/piloteHabitat.php";
require_once dirname(__FILE__)."/lib/class/managerHabitatBdd.php";
 include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php" ;


/**-------------------------------GESTION-----DES----HABITATS------------------------------------------------ */

/*appel de la classe ManagerEmploye*/
$managerHabitat = new ManagerHabitatBdd($pdo);


/* liste habitat afficher page liste des habitats du zoo*/

function listHabitats(ManagerHabitatBdd $managerHabitat){
$affich_Habitats = $managerHabitat->getAllHabitats();
return $affich_Habitats;
}

/*reception requete d'enregistrement */

if(isset($_POST['button-habitat'])){


   $valeur = htmlspecialchars( $_POST['button-habitat']);
   $nomhabitat = htmlspecialchars($_POST['habitat-name']);
   $descriptionHabitat = htmlspecialchars($_POST['habitat-description']);
   
   
   
   $piloteHabitat = ajoutHabitat($nomhabitat,$descriptionHabitat);
   
   $result =$managerHabitat->addPilote($piloteHabitat);
   if($result === true){
       echo "habitat enregistré avec success";
   }else{
       echo"erreur d'enregistrement";
   }
   
   }
   
   /*instanciationdel'objet PiloteHabiat*/
   function ajoutHabitat($habitatNom,$habitatDescription){

      $tableauHabitat = array("habitat_nom"=>$habitatNom,"habitat_description"=>$habitatDescription);
          $habitat = new PiloteHabitat($tableauHabitat);
          return $habitat;
  }



/*reception requete suppression page liste des habitats*/

if(isset($_POST['supr-Habitat'])){
$habitatId = $_POST['supr-Habitat'];
$result = supprHabitat($habitatId,$managerHabitat);
if($result=== true){
   echo"habitat supprimé";
}else{
   echo "echec suppression";
}
}

/*fonction de suppression habitat*/
function supprHabitat($id,ManagerHabitatBdd $manager){
$result = $manager->deleteHabitatByNum($id);
return $result;
}


/*chargement du formulaire habitat*/

if(isset($_POST['habitatName'])){

   $nameHabitat = htmlspecialchars(trim($_POST['habitatName']));
   
   /*$habitat = $managerHabitat->getPilote($nameHabitat);*/
   
   getHabitat($nameHabitat,$managerHabitat);
   
       
   }
   



/*injection des données de l'habitat courant dans le formulaire avant modification*/

function getHabitat($habitatName,$manager){

    $manager;

    
 $habitat = $manager->getPilote($habitatName);
 if($habitat !== null){
 echo "<label for='habitat-titre' class='form-label text-light'>Nom de l'habitat à Modifier</label>";
 echo"<p class='habitat-titre text-light' id='habitat-titre'>".$habitat->getHabitatname()."</p>";
 echo "<label for='habitat-description' class='form-label text-light'>Description de l'habitat</label>";
 echo "<input class='form-control' type='text' id='habitat-description' name='habitat-description'value=".$habitat->getHabitatDescription().">";
 echo "<input class='form-control' type='hidden' id='habitat-id' name='habita-id' value=".$habitat->getHabitatid().">";
 echo "<label for='habitat-name' class='form-label text-light'>Nom de l'habitat</label>";
 echo "<input class='form-control' type='text' id='habitat-name'name='habitat-name'value=".$habitat->getHabitatname().">";
 
 
 
echo '<button id="modif-habitat"class="btn btn-primary" name="modif-habitat">modifier</button>';
echo '</form>';

 }else{
    echo "<div class='alert alert-danger' role='alert'>
    l'habitat n'existe pas
  </div>";
  
 }
 
}





   if(isset($_POST['modification'])){

$habitaName =  $_POST ["habitat-name"];
$habitatDescription = $_POST ["habitat-description"];
$habitaId = $_POST["habitat-id"];

$tabHabitat =array("habitat_id"=>$habitaId,"habitat_nom"=>$habitaName,"habitat_description"=>$habitatDescription);
$objHabitat = new PiloteHabitat($tabHabitat);
$result = updateHabitat($objHabitat,$pdo);
if($result != false){
echo "l'\habitat à été modifié avec succeès";

   }else{
      echo "echec de modification";
   }
}
   
   function updateHabitat(PiloteHabitat $objHabitat,object $pdo){


      $managerHabitat =new ManagerHabitatBdd($pdo);
      $result = $managerHabitat->updatePilote($objHabitat);
      return $result;


   }
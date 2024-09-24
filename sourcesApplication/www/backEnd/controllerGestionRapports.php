<?php
require_once dirname(__FILE__)."/lib/pdo.php";
require_once dirname(__FILE__)."/lib/class/piloteRapport.php";
require_once dirname(__FILE__)."/lib/class/managerRapportBdd.php";
require_once dirname(__FILE__)."/lib/class/managerAnimal.php";
require_once dirname(__FILE__)."/lib/class/piloteAnimal.php";
require_once dirname(__FILE__)."/lib/class/piloteCommentsVeto.php";
require_once dirname(__FILE__)."/lib/class/managerCommentsBdd.php";
require_once dirname(__FILE__)."/lib/class/managerHabitatBdd.php";
require_once dirname(__FILE__)."/lib/class/piloteHabitat.php";


/*appel du manager*/

$manager = new ManagerRapportBdd($pdo);

function commentsHabitatVeto($pdo){
$managerComments = new ManagerCommentsBdd($pdo);
$tbComments = $managerComments->getAllComments();

return $tbComments;
}

function listhabitat(object $pdo){
    $managerHabitat =new ManagerHabitatBdd($pdo);
    $listhabitat = $managerHabitat->getAllHabitats();
    return $listhabitat;
}


function listCommentsByOffset(object $pdo, $page){
    
    $managerComments = new ManagerCommentsBdd($pdo);
    $tbComments = $managerComments->getAllCommentsByPage($page);

    return $tbComments;

}

function listRapports($pdo){
    $page =1;
    $manager = new ManagerRapportBdd($pdo);
   $tabRapport = $manager->getAllRapportsByPage($page);
   return $tabRapport;
   
}

function listRapportByOffset(object $pdo,$page){

    $manager = new ManagerRapportBdd($pdo);
    $tabRapport = $manager->getAllRapportsByPage($page);
    return $tabRapport;

}








if(isset($_POST['recherche-rapport'])){

$idanimal =    htmlspecialchars(trim($_POST['recherche-rapport']));
$objRapport = $manager->getPilote($idanimal);

$managerAnimal = new ManagerAnimal($pdo);
$objAnimal = $managerAnimal->getPiloteById($idanimal);

echo '<p>Nom de l animal concerné :'.$objAnimal->getAnimalname().'</p>';
echo '<p>Détail:'.$objRapport->getRapportdetail().'</p>';

}


/*receptionrequete formulaire de saisie rapport santé animaux */

if(isset($_POST['ajout-rapport-veterinaire'])){

   $idEmployé = trim(htmlspecialchars($_POST['id-user']));
   

   $champDetail= htmlspecialchars($_POST['champ-detail']);
   $idAnimal= trim(htmlspecialchars($_POST['id_animal']));
   
    $champSante =htmlspecialchars($_POST['rapport-santé']);
    $manager =new ManagerRapportBdd($pdo);

    
$report = tabRapport($idEmployé,$champDetail,$idAnimal,$champSante);

$result =$manager->addPilote($report);
if($result!= true){
    echo "Votre rapport n'a pas été enregistré";
}else{
    echo"rapport enregistré";
}

}


function tabRapport($idemp,$champDet,$idAn,$champSant){

$tabValeur = array("Id_Employé"=>$idemp,"rapport_Detail"=>$champDet,"Id_Animal"=>$idAn,"etat_de_santé_animal"=>$champSant);
$rapport =new PiloteRapport($tabValeur);
return $rapport;


}




/*reception requete formulaire saisie état habitat*/

if(isset($_POST['btn-comment'])){

    
  $idUser = trim(htmlspecialchars($_POST["id-user"]));
    $champComment = htmlspecialchars($_POST["champ-detail"]);
   $idHabitat = trim( htmlspecialchars($_POST["habitat_id"]));

   $tabComment = array("comment_label"=>$champComment,"veto_id"=>$idUser,"habitat_id"=>$idHabitat);
   
   $comment =new PiloteCommentsVeto($tabComment);
   
   $result = recordCommentVeto($pdo,$comment);

echo $result;
}



function recordCommentVeto(object $pdo, PiloteCommentsVeto $message){
    $managerComment =new ManagerCommentsBdd($pdo);
    $reponse = $managerComment->addPilote($message);
    if($reponse !=false){
        echo" Commentaire enregistré";
    }else{
        echo "echec enregistrement";
    }
}
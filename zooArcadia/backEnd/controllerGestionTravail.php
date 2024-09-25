<?php

require_once dirname(__FILE__)."/lib/pdo.php";
require_once dirname(__FILE__)."/lib/class/managerAnimal.php";
require_once dirname(__FILE__)."/lib/class/PiloteAnimal.php";
require_once dirname(__FILE__)."/lib/class/PiloteAlimentation.php";
require_once dirname(__FILE__)."/lib/class/managerAlimentationBdd.php";
require_once dirname(__FILE__)."/lib/class/PiloteAvis.php";
require_once dirname(__FILE__)."/lib/class/managerAvisBdd.php";



/*appel du manager*/

$manager = new ManagerAlimentationBdd($pdo);

/*affichage liste rapports alimentaire*/

function listReportAlim(ManagerAlimentationBdd $manager){

$tbComments = $manager->getAllAlimentationRep();
return $tbComments;
}

function listAvis(object $pdo){

    $manager = new ManagerAvisBdd($pdo);
    $tbAvis = $manager->getAllAvis();
    return $tbAvis;
}



function listAvisByPage(object $pdo, $page){
    
    $manager = new ManagerAvisBdd($pdo);
    $tbComments = $manager->getAllAvisByPage($page);

    return $tbComments;

}


function listRapportByOffset(object $pdo,$page){
    echo "BONNE PAGE";
    $manager = new ManagerRapportBdd($pdo);
    $tabRapport = $manager->getAllRapportsByPage($page);
    return $tabRapport;

}

function listAnimaux(object $pdo){
    $managerAnimal =new ManagerAnimal($pdo);
    $tabAnimal = $managerAnimal->getAllAnimals();
    return $tabAnimal;
}


/*reception requete page alimentation*/
if(isset($_POST['btn-alim'])){
$idAnimal = htmlspecialchars($_POST["id-ani-alim"]);
$idEmployé =htmlspecialchars($_POST["id-emp-alim"]);
$labelAlim= htmlspecialchars($_POST["label-alim"]);
$qté = htmlspecialchars($_POST["alim-quantité"]);
var_dump($_POST["alim-quantité"]);
$tabAlimentation = array("alimentation_label"=>$labelAlim,"alimentation_qté"=>$qté,"employé_id"=>$idEmployé,"animal_id"=>$idAnimal);
$newRepAlim = new PiloteAlimentation($tabAlimentation);
var_dump($newRepAlim);
recordAlimentation($pdo,$newRepAlim);
}

/*enregistrement donné saisie rapport alimentaion*/

function recordAlimentation(object $pdo, PiloteAlimentation $piloteReport){
    $manager = new ManagerAlimentationBdd($pdo);
    $reponse = $manager->addPilote($piloteReport);
    if($reponse !=false){
        echo" Rapport alimentation enregistré";
    }else{
        echo "echec enregistrement";
    }
}





if(isset($_POST['id-avis'])){

$avis = $_POST['id-avis'];
$status = $_POST['valeur'];

echo "valeur ".$status;
$result = validerAvis($pdo,$avis,$status);
if($result){
    echo"statut modifier avec succès";
}else{
    echo "echec modification";
}

}


function validerAvis($pdo,$avis,$statusMessage){



    $manager =new ManagerAvisBdd($pdo);
if($statusMessage == 0){

    $changeStatus =1;
 $result=   $manager->updatePilote($avis,$changeStatus);
}else {
$changeStatus =0;

$result = $manager->updatePilote($avis,$changeStatus);
}

return $result;
}






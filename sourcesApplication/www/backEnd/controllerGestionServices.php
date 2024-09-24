<?php
require_once dirname(__FILE__)."/lib/pdo.php";
require_once dirname(__FILE__)."/lib/class/piloteService.php";
require_once dirname(__FILE__)."/lib/class/managerServiceBdd.php";


/*appel du manager*/


$managerService = new ManagerServiceBdd($pdo);



/*Affichage de la liste des services*/




function listServices($pdo){
    $affichServices= new ManagerServiceBdd($pdo);
   $tabServices = $affichServices->getAllServices();
   return $tabServices;
}


/*reception de la requete page liste et suppression de service */

if(isset($_POST['supr-service'])){

    $id = htmlspecialchars(trim($_POST['supr-service']));

    echo $id;
   
   
 $result = deleteService($id,$managerService);
 

 if($result === true){
     echo"service supprimé avec succès";
 }else{
     echo "echec suppression";
 }
 
 }
 


function deleteService($serviceId,ManagerServiceBdd $manager){
    $resultat = $manager->deletePiloteByNum($serviceId);
    return $resultat;
}







/*reception requete affichage formulaire de modification*/

if(isset($_POST['service-name'])){

    $nameService = htmlspecialchars(trim($_POST['service-name']));

getService($nameService,$managerService);


}




function getService($serviceName,ManagerServiceBdd $manager){

    $manager;

    
 $service = $manager->getPilote($serviceName);
 if($service !== null){
 echo "<label for='servicename' class='form-label'>nom du service à Modifier</label>";
 echo"<p class='service-name' id='service-name'>".$service->getServiceNom()."</p>";
 
 echo "<input class='form-control' type='text' id='service-description' name='service-description'value=".$service->getServiceDescription().">";
 echo "<input class='form-control' type='hidden' id='service-id' name='service-id' value=".$service->getServiceId().">";
 echo "<input class='form-control' type='text' id='servie-icon'name='service-icon'value=".$service->getIcon().">";
 
echo '<button id="modif-service"class="btn btn-primary" name="modif-service">modifier</button>';
echo '</form>';

 }else{
    echo "<div class='alert alert-light' role='alert'>
   <h4> Le service n'existe pas</h4>
  </div>";
  
 }
 
}


if(isset($_POST["btn-service"])&& isset($_POST["name-service"])){

    
    $serviceName = htmlspecialchars($_POST["name-service"]);
    $serviceDescription= htmlspecialchars($_POST["service-description"]);
    $userId =htmlspecialchars($_POST["user-id"]);
    

   $service = tabService($serviceName,$serviceDescription,$userId);
   
 $result = $managerService->addPilote($service);
if($result != false){
    echo "nouveau service ajouté";
}else{
    echo "echec ajout service";
}

}


function tabService($servName,$servDescription,$empId){
    $tabValeur =array("service_nom"=>$servName,"service_description"=>$servDescription,"id_employé"=>$empId);
    $service = new PiloteService($tabValeur);
    return $service;
}

?>
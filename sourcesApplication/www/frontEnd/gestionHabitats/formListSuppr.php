<?
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);


include_once REP_APP. "/backEnd/controllerGestionHabitat.php";
include_once REP_APP. "/backEnd/lib/pdo.php";
?>






<?php
$manager =new ManagerHabitatBdd($pdo);
$tabHabitats = listHabitats($manager);

?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Liste des habitats du zoo</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbHabitat" >
                
        <?php foreach($tabHabitats as $habitat): ?>
            
    
<tr id="liste-employés pb-5">
        
        
     <td id="" class="text-success"> <p><?= $habitat['habitat_nom']?></td><td id="habitat-name<?=$compteurA++;?>"><?=$habitat['habitat_id']?></td><td> Description:</td><td><?= $habitat['habitat_description'] ?></td> <td>  <i class="bi bi-trash"></i></td><td id=<?=$compteurB++;?>" class="supr-habitat">supprimer</td></tr>
        

        <?php endforeach; ?>
                </table>
        
        
        
      
        </div>

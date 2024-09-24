<?php
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);


require_once  REP_APP. "backEnd/lib/pdo.php";
require_once  REP_APP. "backEnd/controllerGestionTravail.php";






if(isset($_POST['pagination-avis'])){

        
        $page = $_POST['pagination-avis'];
$tabAvis = listAvisByPage($pdo,$page);
}else{
        $page =1;
$tabAvis = listAvisByPage($pdo,$page);


}



?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Liste des avis visiteurs</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbvisiteurs" >
                
        <?php foreach($tabAvis as $avis): ?>

                
                
        
    
<tr id="list-avis">
        
        
     <td> 
     Date:<?= $avis['avis_date']?></td><td id="compteur-<?=$avis['avis_id'];?>"><?=$avis['champ_valider'];?></td><td>Visiteur/Pseudo:<?= $avis['visiteur_pseudo']?></td><td>Message:<?= $avis['avis_champ']?></td>
     <td>Valider:<?= $avis['champ_valider']?></td><td class="alimentation-list"></td><td><i id="<?=$avis['avis_id'];?>" class="bi bi-check-circle<?=($avis['champ_valider']===1 ? '-fill' : '')?>"></i></td></tr>
        




     
        <?php endforeach; ?>
                </table>
        
        
        
      
        </div>

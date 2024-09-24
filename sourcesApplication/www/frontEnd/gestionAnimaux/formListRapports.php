<?php define('REP_APP',$_SERVER['DOCUMENT_ROOT']); ?>


<?php include_once  REP_APP. "backEnd/controllerGestionRapports.php" ;?>
<?php include_once REP_APP."backEnd/lib/pdo.php" ;?>



<?php

if(isset($_POST['val-offset'])){
        $page = $_POST['val-offset'];
$tabRapport = listRapportByOffset($pdo,$page);

}else{
        
        $tabRapport=listRapports($pdo);
}

?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3 ">
        <h3 class="text-light">Rapports de santé par animal </h3>
        </div>
        
         
        <div id="affich-rapport"   class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbRapport" >
                
        <?php foreach($tabRapport as $rapport): ?>

               
        
    
<tr class="list-rapport-animaux" id="liste-rapport">
        
        
     <td>Date du rapport:<?= $rapport['rapport_Date']?></td><td id="rapport-id<?=$compteurA++;?>"><?= $rapport['rapport_id']?></td><td>Etat de santé:<?= $rapport['etat_de_santé_animal']?></td> <td><i class="bi bi-binoculars-fill"></i></td><td id="<?= $rapport['Id_Animal']?>" class="consult-detail">Voir détail</td></tr>






     
        <?php endforeach; ?>
        
                </table>
                </div>
        
                
       

<?php include_once "/xampp/htdocs/zooArcadia/backEnd/controllerGestionServices.php" ;?>
<?php include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php" ;?>



<?php
$tabServices = listServices($pdo);

?>
<div  class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Liste des services du zoo</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbServices" >
                
        <?php foreach($tabServices as $service): ?>
            
    
<tr id="liste-services">
        
        
      <td id="zoo-services<?=$compteurA++;?>"><?= $service['service_id']?></td> <td>Nom:</td><td><?=$service['service_nom']?></td><td></td> <td>  <i class="bi bi-trash"></i></td><td id="<?=$compteurB++;?>" class="supr-service">supprimer</td></tr>
        

        <?php endforeach; ?>
                </table>
        
        
        
      
        </div>

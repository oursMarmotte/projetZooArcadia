<?php define('REP_APP',$_SERVER['DOCUMENT_ROOT']); ?>

<?php include_once REP_APP. "backEnd/controllerGestionTravail.php" ;?>
<?php include_once REP_APP. "backEnd/lib/pdo.php" ;?>



<?php

/*if(isset($_POST['pagination-animal'])){
        $page = $_POST['pagination-animal'];
$tabAnimal = listeAnimauxByPage($pdo,$page);
}else{
        $page =1;
$tabAnimal = listeAnimauxByPage($pdo,$page);


}*/

$tabAnimaux = listAnimaux($pdo);
$manager =new ManagerAlimentationBdd($pdo);

$tabAlimentation = listReportAlim($manager);

?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Rapport d'alimentation par animal</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbAlimentation" >
                
        <?php foreach($tabAlimentation as $alimentation): ?>

                
                <?php foreach($tabAnimaux as $animal): ?>
                        <?php if($alimentation['animal_id']== $animal['Id_Animal']):?>
                                <?php $nomAnimal= $animal['animal_firstName']?>
                                <?php endif?>
                        <?php endforeach?>
        
    
<tr id="liste-alimentation">
        
        
     <td> Name de l animal:<?= $nomAnimal ;?></td><td id="animal-name<?=$compteurA++;?>">Date:<?= $alimentation['alimentation_date']?></td> <td>Détail:<?= $alimentation['alimentation_label']?></td>
     <td>Quantité:<?= $alimentation['alimentation_qté']?></td><td id=<?=$compteurB++;?>" class="alimentation-list"></td></tr>
        





     
        <?php endforeach; ?>
                </table>
        
        
        
      
        </div>

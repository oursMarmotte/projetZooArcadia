<?php define('REP_APP',$_SERVER['DOCUMENT_ROOT']); ?>

<?php include_once REP_APP. "backEnd/controllerGestionAnimaux.php" ;?>
<?php include_once REP_APP. "backEnd/lib/pdo.php" ;?>



<?php

if(isset($_POST['pagination-animal'])){
        $page = $_POST['pagination-animal'];
$tabAnimal = listeAnimauxByPage($pdo,$page);
}else{
        $page =1;
$tabAnimal = listeAnimauxByPage($pdo,$page);
}
?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Nos animaux</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbAnimal" >
                
        <?php foreach($tabAnimal as $animal): ?>

                
        
    
<tr id="liste-animaux">
        
        
     <td> Name de l animal:<?= $animal['animal_firstName']?></td><td id="animal-name<?=$compteurA++;?>"><?= $animal['Id_Animal']?></td> <td>  <i class="bi bi-trash"></i></td><td id=<?=$compteurB++;?>" class="supr-animal">effacer l' animal</td></tr>
        





     
        <?php endforeach; ?>
                </table>
        
        
        
      
        </div>

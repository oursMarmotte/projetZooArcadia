<?php include_once "/xampp/htdocs/zooArcadia/backEnd/routeurGestion.php" ;?>
<?php include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php" ;?>



<?php
$tabEmployés = listEmployés($pdo);

?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Comptes employés zoo arcadia</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbEmployé" >
                
        <?php foreach($tabEmployés as $employé): ?>
        
    
<tr id="liste-employés">
        
        
     <td id="<?= $employé['employé_id']?>"> Name:</td><td id="employé-name<?=$compteurA++;?>"><?=$employé['username']?></td><td>   Email:</td><td><?= $employé['email'] ?></td> <td></td> <td>  <i class="bi bi-trash"></i></td><td id="<?=$compteurB++;?>" class="supr-compte">supprimer le compte</td></tr>
        

        <?php endforeach; ?>
                </table>
        
        
       
      
        </div>
        <div class="alert alert-success" role="alert">
        <p id="affichage-reponse"></p>
</div
        
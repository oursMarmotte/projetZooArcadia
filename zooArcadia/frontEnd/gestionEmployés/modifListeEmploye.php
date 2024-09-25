<?php include_once "/xampp/htdocs/zooArcadia/backEnd/routeurGestion.php" ?>


<?php
$tabUser =  $tabEmployé;

?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Comptes utilisateurs</h3>
        </div>
        
         
        <div class=" text-start">
          <ul>
            <table > 
        <?php foreach($tabUser as $employé): ?>


          <tr id="tabEmployé"> <td> Nom:<?= $employé['username'] ?></td><td> Email :<?= $employé['email'] ?></td><td><a href="lib/routeurGestion.php?modifUser=<?= $employé['employé_id']?>"><i class="bi bi-trash"></i></a></td><td>modifier le compte</td></tr>
        
        



        <?php endforeach; ?>
        </ul>

</table>
       
        
        </div>

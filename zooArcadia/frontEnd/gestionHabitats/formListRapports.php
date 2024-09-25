<?php include_once "/xampp/htdocs/zooArcadia/backEnd/controllerGestionRapports.php" ;?>
<?php include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php" ;?>



<?php

$listhabitat = listhabitat($pdo);

if(isset($_POST['pagination-habitat'])){
        
        $page = $_POST['pagination-habitat'];
        echo $page;
$tabCommentaires = listCommentsByOffset($pdo,$page);
}else{
        $page =1;
$tabCommentaires = listCommentsByOffset($pdo,$page);
}


?>
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Rapports états des habitats</h3>
        </div>
        
         
        <div class=" card text-start " >
          
            
                <?php $compteurA=0;?>
                <?php $compteurB=0;?>
                <table id="tbAnimal" >
                
        <?php foreach($tabCommentaires as $comments): ?>

                <?php foreach($listhabitat as $habitat): ?>
                        <?php if($habitat['habitat_id']== $comments['habitat_id']):?>
                                <?php $nomhabitat= $habitat['habitat_nom']?>
                                <?php endif?>
                        <?php endforeach?>
        
    
<tr id="liste-comments">
        
        
     <td>Date de l'avis:<?= $comments['comment_date']?></td><td id="comment-name<?=$compteurA++;?>"><?= $comments['habitat_id']?></td><td></td><td> Avis du vétérinaire:<i class="bi bi-chat-dots"></i><?= $comments['comment_label']?></td> <td>Nom de l'habitat:<?=$nomhabitat;?></td><td id=<?=$compteurB++;?>" class="comment-veto"></td></tr>
        





     
        <?php endforeach; ?>
                </table>
        
        
        
      
        </div>

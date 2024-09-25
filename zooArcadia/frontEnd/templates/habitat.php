
<?php  
$managerHabitat= new ManagerHabitatBdd($pdo);

if(isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = (int) strip_tags($_GET['page']);

  $tabHabitat  = $managerHabitat->getAllHabitatsByPage($currentPage);
}else{
  $currentPage = 1;
  $tabHabitat  = $managerHabitat->getAllHabitatsByPage($currentPage);
}

$managerAnimal= new ManagerAnimal($pdo);
$tabAnimaux = $managerAnimal->getAllAnimals();
$managerRapport =new ManagerRapportBdd($pdo);
$tabRapport = $managerRapport->getAllRapports($pdo);
//$tabRapport = getRapporByDate($pdo);


if(isset($_GET['habitat'])){
  $idhabitat = $_GET['habitat'];
  header('Location: displayHabitat.php?id='.$idhabitat);
  


 
}
$nbHabitat = $managerHabitat->getNbTotalHabitats();


$NbPages = ceil($nbHabitat[0] / 3);






$page =0;
?>


<h3 class="text-center text-white">Nos habitats et leurs animaux vous attendent</h3>
<h3 class="text-center text-white">Tous nos services ,Restauration,visite guidés ,informations</h3>
<div class="container px-4 py-5  " id="featured-3">
    
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light">


    <?php 
    
    foreach($tabHabitat as $habitat){?>
  
      <div class="card feature col bg-white ms-1 me-1 px-5 py-5">
      <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3 align-items-center">
        <h3 class="fs-3  text-body-emphasis-light"> <?php echo $habitat['habitat_nom'];?></h3>
        </div>
      <div class="card  mb-5">
          
         
        
        <p><?php echo $habitat['habitat_description']; ?></p>
        
      </div>
      <div id="habitat-selection"  class="card text-bg-success  mb-3"><i class="bi bi-caret-right-square"><a  class="link-light" href="?habitat=<?php echo $habitat['habitat_id']; ?>">visiter</a></i></div>
        
      </div>
      <?php } ?>
      
     
      
    </div>
  </div>
  <div class="container-pagination d-flex flex-wrap  justify-content-center ">
  <nav aria-label="...">
  <ul class="pagination">
    
    <li class="page-item <?= ($currentPage === 1)? "disabled": "" ?> ">
      <a class="page-link" href="nosHabitats.php?page=<?php echo $currentPage -1 ?>">Precedent</a>
    </li>

    <?php for($page = 1 ; $page <= $NbPages; $page++): ?>
    

    <li class="page-item <?= ($currentPage == $page)? "active": "" ?>">
    
    <a href="nosHabitats.php?page=<?= $page ?>" class="page-link"><?= $page ?></a></li>
   <?php endfor ?> 
    
    <li class="page-item <?= ($currentPage == $NbPages)? "disabled": "" ?>">
    <a class="page-link" href="nosHabitats.php?page=<?php echo $currentPage +1 ?>">suivant</a>
    </li>
  </ul>
</nav>
</div>
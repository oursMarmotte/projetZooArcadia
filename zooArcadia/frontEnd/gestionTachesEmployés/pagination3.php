<?php
define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/');

require_once BASE_URL."backend/lib/pdo.php";
require_once BASE_URL."backend/lib/class/PiloteAvis.php";
require_once BASE_URL."backend/lib/class/managerAvisBdd.php";

$manager =new ManagerAvisBdd($pdo);

$nbTotalRapports = $manager->getNbTotalAvis();

$nbPages = ceil($nbTotalRapports[0] / 5);
$offSetPage =0;
echo $nbPages;
$currentPage = 1;
$page =0;
?>


<div  class="container-pagination d-flex flex-wrap  justify-content-center ">
  <nav aria-label="...">
  <ul   class="pagination">
    
    
    

    <?php for($page = 1 ; $page <= $nbPages; $page++): ?>
    

    <li class="page-item " id ="page-item-rapport<?= ($currentPage == $page)? "active": "" ?>">
    
    <li class="" id="rapport-page<?= $page ?>" value="">
      <input type="hidden" id="offset-<?= $page ?>" value="<?=$offSetPage = 5 * ($page -1 )?>">
    </li><button id="<?= $page ?>" class="btn btn-secondary"><?= $page ?></button>
   <?php endfor ?> 
    
    
  </ul>
</nav>
</div>
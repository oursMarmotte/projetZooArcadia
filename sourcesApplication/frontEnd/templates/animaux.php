<?php include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php"?>
<?php include_once "/xampp/htdocs/zooArcadia/backEnd/lib/listeAnimaux.php"?>

<h3 class="text-center text-white">Tous nos animaux classés par espèce et catégorie</h3>

<?php  $category = getCategorieAnimal($pdo)?>

<div class="container px-4 py-5 d-flex "  id="featured-4">
<div class="card mb-3  me-5 bg-secondary text-white" style="width: 18rem;height:18rem">
  <div class="card-body">
    <h5 class="card-title">Choisisez vos animaux</h5>

    <?php foreach($category as $animalCat):?>
  
  
  <button type="button" class="btn btn-light"><a href="?page=<?=$animalCat['race_id'] ?>"><?= $animalCat['animal_label'] ?></a></button>
  
  <?php endforeach ?>

  </div>
</div>

  
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light"style="width:65%">


    <?php 

    if(isset($_GET['page']) && !empty($_GET['page'])){
      $currentPage = (int) strip_tags($_GET['page']);
    }else{
      $currentPage = 1;
    }


//compter nb total animaux
$countstatement = $pdo->prepare('SELECT COUNT(*) AS totalAnimaux FROM animal
');
$countstatement->execute();
//nombre total animaux
    $nbTotal = $countstatement->fetch(PDO::FETCH_ASSOC);



    $NbPages = ceil($nbTotal['totalAnimaux'] /5);


    $offSetPage = 5 * ( $currentPage - 1);

    
  /*Affichage de chaque animal*/


    $pdo;
    $listeAnimaux = affichAnimaux($pdo);
    foreach($listeAnimaux as $animal){?>

      <div class="card col bg-white ps-2 pe-2 ms-2 me-2 px-5 py-5">
        
        
        
        <div class="text-center">
  <img src="/Assets/images/<?php echo $animal['image']; ?> " class="rounded" alt="panda" width="120" height="100">
</div>
        
        
        <p class="fs-4 text-body-emphasis"><?php echo $animal['animal_firstName']; ?></p>
        <p></p>
        
        
      </div>
      <?php } ?>
      
     
      
    </div>
  </div>


<div class="container-pagination d-flex flex-wrap  justify-content-center ">
  <nav aria-label="...">
  <ul class="pagination">
    
    <li class="page-item <?= ($currentPage === 1)? "disabled": "" ?> ">
      <a class="page-link" href="nosAnimaux.php?page=<?php echo $currentPage -1 ?>">Precedent</a>
    </li>

    <?php for($page = 1 ; $page <= $NbPages; $page++): ?>
    

    <li class="page-item <?= ($currentPage == $page)? "active": "" ?>">
    
    <a href="nosAnimaux.php?page=<?= $page ?>" class="page-link"><?= $page ?></a></li>
   <?php endfor ?> 
    
    <li class="page-item <?= ($currentPage === $NbPages)? "disabled": "" ?>">
    <a class="page-link" href="nosAnimaux.php?page=<?php echo $currentPage +1 ?>">suivant</a>
    </li>
  </ul>
</nav>
</div>
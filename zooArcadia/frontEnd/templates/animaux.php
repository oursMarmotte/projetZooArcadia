

<?php   
$managerCat = new ManagerCategorieBdd($pdo);
$managerAn =new ManagerAnimal($pdo);
$managerReport = new ManagerRapportBdd($pdo);
$tabRaport = $managerReport->getRapporByDate();

$listeAnimaux = $managerAn->getAllAnimals();

if(isset($_GET['envoilike'])){
 $idAnimal=  $_GET['envoilike'];

 $piloteAnimal= $managerAn->getPiloteById($idAnimal);

 $animalName= $piloteAnimal->getAnimalname();

$result = addClickMongoDB($client,$animalName);


//$result = addDocumentMongoDB($client,$animalName);
//var_dump( $result);

}

/*fonctions d'ajout de documents et et de stokage de données dans Atlas mongodb */
function addClickMongoDB(  object $connectMongo,string $aniName){
$zooArcadiaDb = $connectMongo->zooarcadia;
$aniDataCollection = $zooArcadiaDb->animalData;
$result = $aniDataCollection->findOne(['name'=>$aniName]);
 
if($result){
 $aniDataCollection->updateOne(['name'=>$aniName],['$inc'=>['click'=> 1]]);

}else{
  addDocumentMongoDB( $connectMongo ,$aniName);
}
return $result;
}

 

  function addDocumentMongoDB(object $connectMongo ,$nameAnimal){

    $zooarcadiadb = $connectMongo->zooarcadia;
    $animalDataCollection = $zooarcadiadb->animalData;

    $result = $animalDataCollection->insertOne(['name'=>$nameAnimal,"click"=>1],['zoo'=>'arcadia']);
return $result;
  }

?>
<?php 

$menuCat = $managerCat->getAllcategorie();

if(isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = (int) strip_tags($_GET['page']);
  $category =  $managerCat->getCategorieById($currentPage);
  
  
}else{

  $currentPage = 1;
  $category =  $managerCat->getCategorieById($currentPage);
  
}



?>

<h3 class="text-center text-white">Tous nos animaux classés par espèce et catégorie</h3>



<div class="container px-4 py-5  "  id="featured-4">

  

  
  <?php foreach($category as $cat):?>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light">

<?php foreach($listeAnimaux as $animal):?>
  
  <?php if($cat['race_id'] === $animal['Id_Race']): ?>
    <div class="card feature col bg-white ms-1 me-1 px-5 py-5">
    <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3 align-items-center">
        <p class="text-light"> <?php echo $animal['animal_firstName'];?></p>
    </div>
        
      
        <img src="/Assets/images/upload/<?php echo $animal['image']; ?> " class="w-100 h-100" >
        <div class=" text-bg-success p-3 mt-5">
<?php foreach($tabRaport as $rapport):?>
<?php if($animal['Id_Animal'] == $rapport['Id_Animal']):?>
  <?php echo "<i class='bi bi-info-square'></i><p class='text-light'>".$rapport['rapport_Detail'].'</p>'; ?>
  

  <?php endif ?>

<?php endforeach ?>
        </div >
        <div class="mt-2">
        <button id="like"class="btn btn-primary " value=""><a href="?envoilike=<?= $animal['Id_Animal']?>">Like</a><i class="bi bi-hand-thumbs-up"></i></button>
        </div>
    </div>

<?php endif ?>
  
      <?php endforeach ?>
      </div>
     <?php endforeach ?>
     
     
     </div>
     
    

  



  
    
    <div class="container-pagination d-flex flex-wrap  justify-content-center ">
  <nav aria-label="...">
  <h5 class="card-title">Choisisez vos animaux</h5>
  <ul class="pagination">

    <?php foreach($menuCat as $animalCat):?>
      
  
    
  

    <li class="page-item <?= ($currentPage == $page)? "active": "" ?>">
    
    <a href="?page=<?=$animalCat['race_id'] ?>" class="page-link"><?= $animalCat['animal_label'] ?></a></li>
   <?php endforeach ?> 
    
    
    </li>
  </ul>
</nav>


</div>
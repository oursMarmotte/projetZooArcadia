<?php include_once dirname(__DIR__)."/backEnd/lib/session.php" ?>
<?php include_once dirname(__FILE__)."/templates/header.php"  ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/pdo.php"?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/piloteAnimal.php"; ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/managerAnimal.php"; ?>

<?php include_once dirname(__DIR__)."/backEnd/lib/class/piloteHabitat.php"; ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/managerHabitatBdd.php";  ?>


<?php $manager = new ManagerHabitatBdd($pdo);
if(isset($_GET['id'])){
    $idhabitat =$_GET['id'];
    
$habitat = $manager->getPiloteById($idhabitat);

$animal = new ManagerAnimal($pdo);
$tabAnimal = $animal->getAllAnimals();


}
?>
<main class="affich-centre" id="main-page">




<h1>page par habitat </h1>

<h3 class="text-center text-white">Tous nos animaux dans leurs environnement</h3>
<div class="container px-4 py-5  " id="featured-3">
    
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light">



    

  
      <div class="card feature col bg-white ms-1 me-1 px-5 py-5">
      <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3 align-items-center">
        <h3 class="fs-3  text-body-emphasis-light"> <?php echo $habitat['habitat_nom'];?></h3>
        </div>
      <div class="card  mb-5">
          
         
        
        <p><?php echo $habitat['habitat_description']; ?></p>
        
      </div>
      <div class="card text-bg-success  mb-3"><i class="bi bi-caret-right-square"></i></div>
        
      </div>
      
      <?php  foreach($tabAnimal as $animal):?>
<?php if($animal['Id_Habitat']== $idhabitat):?>
        <div class="card feature col bg-white ms-1 me-1 px-5 py-5">
      <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3 align-items-center">
        <h3 class="fs-3  text-body-emphasis-light"> <?= $animal['animal_firstName'];?></h3>
        </div>
      <div class="card  mb-5">
          
         
        
        <p ><img class="w-100 h-100" src="/Assets/images/<?php echo $animal['image']; ?>"</p>
        
      </div>
      <div class="card text-bg-success  mb-3"><i class="bi bi-caret-right-square"></i></div>
        
      </div>
      <?php endif ?>
        <?php endforeach?>
        
    </div>
    <div>
    <button class="btn btn-primary btn-lg  mt-5"><a  class="link-light"  href="/frontEnd/nosHabitats.php">retour</a></button>
    </div>

</main>

<?php include_once dirname(__FILE__)."/templates/footer2.php"  ?>
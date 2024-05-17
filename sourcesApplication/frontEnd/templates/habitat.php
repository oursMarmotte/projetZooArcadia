<?php include_once "../backEnd/lib/pdo.php"?>
<?php include_once "../backEnd/lib/listeAnimaux.php";
include_once "../backEnd/lib/listeHabitats.php"; ?>
<?php include_once "../backEnd/lib/rapportVeterinaire.php";  ?>

<?php  


$tabHabitat = getHabitats($pdo);

$animalByHabitat = getAnimalByHabitat($pdo);

$tabRapport = getRapporByDate($pdo);

$date = new DateTime();



?>

<h3 class="text-center text-white">Nos habitats et leurs animaux vous attendent</h3>
<?php foreach($tabHabitat as $habitat): ?>


<div class="container px-4 py-5 mt-5 mb-5 bg-light d-flex " id="featured-3">

<div class="card col bg-secondary text-white">
<h3><?= $habitat['habitat_nom'] ?></h3>
    <p><?= $habitat['habitat_description']?></p></div>

    <?php foreach($animalByHabitat as $animal): ?>
<?php if($animal['Id_Habitat'] == $habitat['habitat_id']): ?>
<div class="card col bg-white ms-1 me-1 px-5 py-5">
<div>


    
        

    <div class="col justify-content-center ">
    <div class="col d-flex justify-content-center me-2 ms-2 pt-2 pb-2 ps-2 pe-2">
    <img src="/Assets/images/<?= $animal['image'] ?>" width="150" height="100">
    </div>
    <div>
    <?= $animal['animal_firstName'] ?>
             
    </div>

            </div>
            <?php foreach($tabRapport as $rapport): ?>
             <?php if($animal['Id_Animal'] == $rapport['Id_Animal']  ): ?>
                <div class="infoveto  mt-5">
                <button class=" btn btn-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <p>Avis du vétérinaire</p>
      </button>
      <div class="collapse" id="collapseExample">
      <p><?= $rapport['rapport_Detail'] ?></p>
      </div>
                </div>
             <?php endif ?>
    
             <?php endforeach ?>





</div>
<p></p>
</div>
<?php endif ?>
<?php endforeach ?>

</div>
<?php endforeach ?>
</div>


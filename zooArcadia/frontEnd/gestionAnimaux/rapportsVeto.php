<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);


require_once  REP_APP. "/backEnd/lib/pdo.php";
require_once  REP_APP. "/backEnd/lib/class/managerAnimal.php";
require_once  REP_APP. "/backEnd/lib/class/PiloteAnimal.php";
require_once  REP_APP. "/backEnd/lib/class/managerEmployeBdd.php";
require_once  REP_APP. "/backEnd/lib/class/piloteEmployeBdd.php";
?>
<?php 
$managerUser = new ManagerEmploye($pdo);
$managerAnimal = new ManagerAnimal($pdo);
$tabEmployés = $managerUser->getAllEmployés();

$tabAnimals = $managerAnimal->getAllAnimals();
?>

<div id="form-vétérinaire" class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center" >
        <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Rapport vétérinaire </h3>
        </div>
        
        <div class=" text-start">
      
        <form action="" method="">
        
                <label for="rapport_Detail" class="form-label">Détail du rapport</label>
                <input type="textarea" name="rapport_Detail" id="rapport_Detail" class="form-control" required>
            
            
            <label for="etat_de_santé_animal" class="form-label">Etat de santé</label>
                <input type="textarea" name="etat_de_santé_animal" id="etat_de_santé_animal" class="form-control" required>

        

          
          <select class="form-select " id="Id_Animal">
          <option value="" name="Id_Animal">Nom animal</option>
          <?php foreach($tabAnimals as $animal):?>
       <option value="<?=$animal['Id_Animal']?>"><?=$animal['animal_firstName'] ?></option> 

          <?php endforeach ?>
          </select>
          
          
          <select class="form-select" id="Id_Employé">
          <option value="" name="Id_Employé">Nom employé</option>
          <?php foreach($tabEmployés as $employé): ?>
            <option value="<?=$employé['employé_id'] ?>"><?= $employé['username'] ?></option>

            <?php endforeach ?>
          </select>
          
          
          
            <input type="submit" id="ajout-rapport-veterinaire" " name="ajout-rapport-veterinaire" value="enregistrer" class="btn btn-primary">
            
        </form>

        
        </div>
        

        </div>
        


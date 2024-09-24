<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);

require_once  REP_APP. "backEnd/lib/session.php";
require_once  REP_APP. "backEnd/lib/pdo.php";
require_once  REP_APP. "backEnd/lib/class/managerAnimal.php";
require_once  REP_APP. "backEnd/lib/class/piloteAnimal.php";
require_once  REP_APP. "backEnd/lib/class/managerEmployeBdd.php";
require_once  REP_APP. "backEnd/lib/class/piloteEmployeBdd.php";
?>
<?php 
$managerUser = new ManagerEmploye($pdo);
$managerAnimal = new ManagerAnimal($pdo);
$tabEmployés = $managerUser->getAllEmployés();

$tabAnimals = $managerAnimal->getAllAnimals();
?>

<div id="form-alimentation" class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center" >
        <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Rapport d'alimentation des animaux </h3>
        </div>
        
        <div class=" text-start">
      
        <form action="" method="">
        
               

        
        <p>Nom de l'animal:

        </p>
          
          <select class="form-select " id="Id_Animal">
            
          <option value="" name="Id_Animal">Nom animal</option>
          <?php foreach($tabAnimals as $animal):?>
       <option value="<?=$animal['Id_Animal']?>"><?=$animal['animal_firstName'] ?></option> 

          <?php endforeach ?>
          </select>
          
          <p>Nom de l'employé:</p>
          <select class="form-select" id="Id_Employé">
          <option value="" name="Id_Employé">Nom employé</option>
          
          <?php foreach($tabEmployés as $employé): ?>
            <?php if($employé['username']== $_SESSION['user']['username']):?>
             
            <option value="<?=$employé['employé_id'] ?>"><?= $employé['username'] ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
          
          <label for="alimentation-Detail" class="form-label">Type d'alimentation </label>
                <input type="textarea" name="alimentation-Detail" id="alimentation-Detail" class="form-control" required>
            
            
            <label for="alimentation-qté" class="form-label">Quantité en kgs</label>
                <input type="textarea" name="" id="alimentation-qté" class="form-control" required>
          
            <input  id="ajout-rapport-alimentation" name="ajout-rapport-alimentation" value="enregistrer" class="btn btn-secondary">
            
        </form>

        
        </div>
        

        </div>
        


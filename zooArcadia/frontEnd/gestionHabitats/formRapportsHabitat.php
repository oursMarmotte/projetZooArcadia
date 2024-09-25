<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);


require_once  REP_APP. "/backEnd/lib/pdo.php";
require_once  REP_APP. "/backEnd/lib/class/managerHabitatBdd.php";
require_once  REP_APP. "/backEnd/lib/class/PiloteHabitat.php";
require_once  REP_APP. "/backEnd/lib/class/managerEmployeBdd.php";
require_once  REP_APP. "/backEnd/lib/class/piloteEmployeBdd.php";
?>
<?php 
$managerHabitat = new ManagerHabitatBdd($pdo);
$managerUser = new ManagerEmploye($pdo);
$tabEmployés = $managerUser->getAllEmployés();
$tabHabitat = $managerHabitat->getAllHabitats();

?>

<div class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center "  >
        <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Rapport habitats  </h3>
        </div>
        
        <div class=" text-start">
      
        <form class="form-group" action="/backEnd/lib/routeurDashboard.php" method="post">
        
                <label for="comment_Detail" class="form-label">Détail du rapport</label>
                <input type="textarea" name="comment_Detail" id="comment_Detail" class="form-control" required>
            
            
           

          
          <select class="form-select " name="habitat_id"  id="habitat_id">
          <option value="" name="habitat_id" >Nom de l'habitat</option>
          <?php foreach($tabHabitat as $habitat):?>
       <option value="<?=$habitat['habitat_id']?>"><?=$habitat['habitat_nom'] ?></option> 

          <?php endforeach ?>
          </select>
          
          
          <select class="form-select" name="Id_Employé" id="Id_Employé">
          <option value="" name="Id_Employé" >Nom employé</option>
          <?php foreach($tabEmployés as $employé): ?>
            <option value="<?=$employé['employé_id'] ?>"><?= $employé['username'] ?></option>

            <?php endforeach ?>
          </select>
          
          
          
            <input type="submit" name="ajout-rapport-habitat"  id="ajout-rapport-habitat" value="enregistrer" class="btn btn-primary">
            
        </form>

        
        </div>
        

        </div>
        




<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);
require_once  REP_APP. "/backEnd/lib/pdo.php";
require_once  REP_APP. "/backEnd/lib/class/managerServiceBdd.php";
require_once  REP_APP. "/backEnd/lib/class/piloteService.php";
require_once  REP_APP. "/backEnd/lib/class/managerEmployeBdd.php";
require_once  REP_APP. "/backEnd/lib/class/piloteEmployeBdd.php";

$managerUser = new ManagerEmploye($pdo);
$tabEmployés = $managerUser->getAllEmployés();
?>



 

<div id="form-serv" class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center" >
        <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Ajouter un service </h3>
        </div>
<form action="#" method=>
        <div class="mb-3">
                <label for="service-name" class="form-label">nom du service</label>
                <input type="text" name="service-name" id="service-name" class="form-control" required>
            </div>
           
      
            <div class="mb-4">
              <label for="service-description" class="service-description">Description</label>
              <input type="text" name="service-description" id="service-description" class="form-control" required>
          </div>
       
          <select class="form-select" id="Id_Employé">
          <option value="" name="Id_Employé">Nom employé</option>
          <?php foreach($tabEmployés as $employé): ?>
            <option value="<?=$employé['employé_id'] ?>"><?= $employé['username'] ?></option>

            <?php endforeach ?>
          </select>

        </form>
        <div id="contenant"><button  id="ajout-service" type="submit" value="ajout-service" class="btn btn-primary">envoyez</button></div>
        
        


</div>


<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);

require_once  REP_APP. "backEnd/lib/pdo.php";
require_once  REP_APP. "backEnd/lib/class/managerHabitatBdd.php";
require_once  REP_APP. "backEnd/lib/class/piloteHabitat.php";
require_once  REP_APP. "backEnd/lib/class/managerCategorieBdd.php";
require_once  REP_APP. "backEnd/lib/class/piloteCategorie.php";


$managerHabitat = new ManagerHabitatBdd($pdo);
$managerCategorie = new ManagerCategorieBdd($pdo);
$tabcategorie  = $managerCategorie->getAllcategorie();
$tabHabitat  = $managerHabitat->getAllHabitats();



?>


 

<div class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center "  >
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Ajouter un animal </h3>
        </div>
<form action="#" method= "">
        <div class="mb-3">
                <label for="animal-name" class="form-label">nom de l'animal</label>
                <input type="text" name="animal-name" id="animal-name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="animal-picture" class="form-label">Ajouter unephoto</label>
                <input type="file" name="animal-picture" id="animal-picture" class="form-control">
                
            </div>
            <div class="mb-3">
            <label for="id_Race" class="form-label">Categorie de l'animal</label>
            <select class="form-select"id="id_Race" name="id_Race">
                <option value="" name="categorie_id"> Categorie</option>
                <?php foreach($tabcategorie as $categorie):?>
       <option value="<?=$categorie['race_id']?>"><?=$categorie['animal_label'] ?></option> 

          <?php endforeach ?>
  
  
</select>
            </div>
      
            
          <div class="mb-3">
          <label for="habitat_id" class="form-label">Habitat de l'animal</label>

          <select class="form-select " name="habitat_id"  id="habitat_id">
          <option value="" name="habitat_id" >Nom de l'habitat</option>
          <?php foreach($tabHabitat as $habitat):?>
       <option value="<?=$habitat['habitat_id']?>"><?=$habitat['habitat_nom'] ?></option> 

          <?php endforeach ?>
          </select>
        
  
</div>


        </form>
        <div id="contenant"><button  id="ajout-animal" type="submit" name="ajout-animal" class="btn btn-primary">envoyez</button></div>
        
        <div id ="ajout-message"></div>


</div>
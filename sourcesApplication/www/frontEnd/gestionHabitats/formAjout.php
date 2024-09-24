

<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);
include_once REP_APP. "/backEnd/routeurGestion.php" ?>


 

<div class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center "  >
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Ajouter un habitat </h3>
        </div>
<form id="formHabitat"  action="#" method=>
        <div class="mb-3">
                <label for="habitat-name" class="form-label">Nom de l'habitat</label>
                <input type="text" name="habitat-name" id="habitat-name" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="habitat-description" class="form-label">Description de l'habitat</label>
            
            <textarea class="form-control" id="habitat-description" name="habitat-description" placeholder="faire une description de l'habitat" id="floatingTextarea"></textarea>

            </div>
      
           
          <div class="mb-3">
      </div>


        </form>
        <div id="contenant-habitat"><button  id="ajout-habitat" type="submit" value="ajout-habitat" class="btn btn-primary">Enregistrer</button></div>
        
        <div id ="status-habitat"></div>


</div>
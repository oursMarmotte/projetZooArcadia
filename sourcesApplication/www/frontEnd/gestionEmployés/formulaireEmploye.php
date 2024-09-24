

<?php 
define('REP_APP',$_SERVER['DOCUMENT_ROOT']);
include_once REP_APP. "/backEnd/routeurGestion.php" ?>


 

<div class="card col-12 mb-5 col-lg-12 col-md-12 col-sm-12 align-items-center justify-content-center "  >
<div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3">
        <h3 class="text-light">Ajouter un employé </h3>
        </div>

<form action="#" method=>
        <div class="mb-3">
                <label for="user-name" class="form-label">Nom de l'employé </label>
                <input type="text" name="user-name" id="user-name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="user-email" class="form-label">Email </label>
                <input type="user-email" name="user-email" id="user-email" class="form-control" required>
            </div>
      
            <div class="mb-4">
              <label for="user-password" class="form-label">Mot de passe</label>
              <input type="text" name="user-password" id="user-password" class="form-control" required>
          </div>
          <select class="form-select"id="id_Role" name="id_Role" required>
  <option value =""selected name="id_Role" >Role</option>
  <option value="1">Administrateur</option>
  <option value="2">Véterinaire </option>
  <option value="3" >Employé</option>
  
</select>


        </form>
        <div id="contenant"><button  id="ajout-employé" type="submit" value="ajout-employé" class="btn btn-primary">Enregistrez</button></div>
        
        <div id ="ajout-message"></div>


</div>
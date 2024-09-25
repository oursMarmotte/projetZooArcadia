<?php include_once REP_APP."/backEnd/routeurGestion.php" ?>

<form action="/backEnd/lib/routeurGestion.php" method="post">
        <div class="mb-3">
                <label for="username" class="form-label">nom de l'employé Modif</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
      
            <div class="mb-4">
              <label for="password" class="form-label">mot de passe</label>
              <input type="text" name="password" id="password" class="form-control" required>
          </div>
          <select class="form-select" name="id_Role" required>
  <option value =""selected name="id_Role" >Role</option>
  <option value="1">Administrateur</option>
  <option value="2">Véterinaire </option>
  <option value="3" >Employé</option>
</select>
          
            
            
        </form>
        

        <div id="reponse"></div>